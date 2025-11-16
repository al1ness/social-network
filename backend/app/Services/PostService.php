<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\Post\PostCreationException;
use App\Exceptions\Post\PostUpdateException;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public static function store(array $data): Post
    {
        try {
            DB::beginTransaction();
            $post = Post::create($data['post']);

            if (isset($data['images'])) {
                $uploadedPaths = ImageService::storeBatch($post, $data['images']);
            }

            if (isset($data['tags'])) {
                $tags = TagService::storeBatch($data['tags']);
                $post->tags()->attach(array_column($tags, 'id'));
            }

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();

            if (!empty($uploadedPaths)) {
                Storage::disk('s3')->delete($uploadedPaths);
            }

            throw new PostCreationException(
                $post,
                'Unexpected error during post creation: ' . $exception->getMessage()
            );
        }

        return $post;
    }

    public static function update(Post $post, array $data): Post
    {
        try {
            DB::beginTransaction();
            $post->update($data['post']);

            if (isset($data['images'])) {
                $uploadedPaths = ImageService::storeBatch($post, $data['images']);
            }

            if (isset($data['tags'])) {
                $tags = TagService::storeBatch($data['tags']);
                $post->tags()->sync(array_column($tags, 'id'));
            }

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();

            if(!empty($uploadedPaths)) {
                Storage::disk('s3')->delete($uploadedPaths);
            }

            throw new PostUpdateException(
                $post,
                'Unexpected error during post update: ' . $exception->getMessage()
            );
        }

        return $post->refresh();
    }
}

<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public static function update(Image $image, array $data): Image
    {
        $image->update($data);
        return $image->refresh();
    }

    public static function storeBatch(Post $post, array $files): array
    {
        if (empty($files)) return [];

        $uploadedPaths = [];

        foreach ($files as $file) {
            $fileName = $file->hashName();
            $path = "posts/{$post->id}/{$fileName}";

            Storage::disk('s3')->putFileAs("posts/{$post->id}", $file, $fileName);

            $post->images()->create([
                'file_path' => $path
            ]);

            $uploadedPaths[] = $path;
        }

        return $uploadedPaths;
    }
}

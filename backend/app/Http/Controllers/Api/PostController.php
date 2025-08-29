<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index(): array
    {
        return PostResource::collection(Post::all())->resolve();
    }

    public function store(): JsonResponse
    {
        Post::create([
            'title' => 'New Post'
        ]);

        return response()->json([
            'message' => 'New post created'
        ], Response::HTTP_OK);
    }

    public function show(Post $post): array
    {
        return PostResource::make($post)->resolve();
    }

    public function update(Post $post): array
    {
        $post->update([
            'title' => 'Over New Post'
        ]);

        return PostResource::make($post)->resolve();
    }

    public function destroy(Post $post): JsonResponse
    {
        $post->delete();

        return response()->json([
            'message' => 'Post deleted'
        ], Response::HTTP_OK);
    }
}

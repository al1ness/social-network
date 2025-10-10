<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Response;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Post\IndexRequest;
use App\Http\Requests\Api\Post\StoreRequest;
use App\Http\Requests\Api\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;

class PostController extends Controller
{
    public function index(IndexRequest $request): array
    {
        $data = $request->validated();

        $posts = Post::filter($data)->get();

        return PostResource::collection($posts)->resolve();
    }

    public function store(StoreRequest $request): array
    {
        $data = $request->validated();

        $post = Post::create($data);

        return PostResource::make($post)->resolve();
    }

    public function show(Post $post): array
    {
        return PostResource::make($post)->resolve();
    }

    public function update(Post $post, UpdateRequest $request): array
    {
        $data = $request->validated();

        $post = PostService::update($post, $data);

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

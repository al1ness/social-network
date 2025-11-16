<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\IndexRequest;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Post\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $posts = PostResource::collection(Post::filter($data)->latest()->get())->resolve();

        if (Request::wantsJson()) {
            return $posts;
        }

        return inertia('Admin/Post/Index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post = PostResource::make($post)->resolve();

        return inertia('Admin/Post/Show', compact('post'));
    }

    public function create()
    {
        $categories = CategoryResource::collection(Category::all())->resolve();

        return inertia('Admin/Post/Create', compact('categories'));
    }

    public function store(StoreRequest $request): array
    {
        $data = $request->validated();

        $post = PostService::store($data);

        return PostResource::make($post)->resolve();
    }

    public function edit(Post $post)
    {
        $post = PostResource::make($post)->resolve();

        $categories = CategoryResource::collection(Category::all())->resolve();

        return inertia('Admin/Post/Edit', compact('categories', 'post'));
    }

    public function update(Post $post, UpdateRequest $request): array
    {
        $data = $request->validated();

        $post = PostService::update($post, $data);

        return PostResource::make($post)->resolve();
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'message' => 'Post deleted successfully'
        ], Response::HTTP_OK);
    }
}

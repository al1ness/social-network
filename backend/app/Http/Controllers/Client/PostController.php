<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Post\IndexRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        $posts = PostResource::collection($posts)->resolve();

        return inertia('Client/Post/Index', compact('posts'));
    }
}

<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        $comments = CommentResource::collection($comments)->resolve();

        return inertia('Client/Comment/Index', compact('comments'));
    }
}

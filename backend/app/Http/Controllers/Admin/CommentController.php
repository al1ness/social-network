<?php

namespace App\Http\Controllers\Admin;

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

        return inertia('Admin/Comment/Index', compact('comments'));
    }

    public function show(Comment $comment)
    {
        $comment = CommentResource::make($comment)->resolve();

        return inertia('Admin/Comment/Show', compact('comment'));
    }
}

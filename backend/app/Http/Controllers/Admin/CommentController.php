<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comment\IndexRequest;
use App\Http\Requests\Admin\Comment\StoreRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

class CommentController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $comments = CommentResource::collection(Comment::filter($data)->get())->resolve();

        if (Request::wantsJson()) {
            return $comments;
        }

        return inertia('Admin/Comment/Index', compact('comments'));
    }

    public function show(Comment $comment)
    {
        $comment = CommentResource::make($comment)->resolve();

        return inertia('Admin/Comment/Show', compact('comment'));
    }

    public function create()
    {
        return inertia('Admin/Comment/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $comment = Comment::create($data);

        return CommentResource::make($comment)->resolve();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json([
            'message' => 'Comment deleted successfully'
        ], Response::HTTP_OK);
    }
}

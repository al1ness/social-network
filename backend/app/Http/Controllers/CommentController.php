<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Models\Chat;

class CommentController extends Controller
{
    public function index()
    {
        //
    }

    public function store(StoreCommentRequest $request)
    {
        //
    }

    public function show(Chat $chat)
    {
        //
    }

    public function update(UpdateCommentRequest $request, Chat $chat)
    {
        //
    }

    public function destroy(Chat $chat)
    {
        //
    }
}

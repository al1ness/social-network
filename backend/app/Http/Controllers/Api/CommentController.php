<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreRequest;
use App\Http\Requests\Comment\UpdateRequest;
use App\Models\Chat;

class CommentController extends Controller
{
    public function index()
    {
        //
    }

    public function store(StoreRequest $request)
    {
        //
    }

    public function show(Chat $chat)
    {
        //
    }

    public function update(UpdateRequest $request, Chat $chat)
    {
        //
    }

    public function destroy(Chat $chat)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Message\StoreMessageRequest;
use App\Http\Requests\Message\UpdateMessageRequest;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        //
    }

    public function store(StoreMessageRequest $request)
    {
        //
    }

    public function show(Message $message)
    {
        //
    }

    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    public function destroy(Message $message)
    {
        //
    }
}

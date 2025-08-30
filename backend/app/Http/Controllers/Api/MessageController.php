<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Message\StoreRequest;
use App\Http\Requests\Message\UpdateRequest;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        //
    }

    public function store(StoreRequest $request)
    {
        //
    }

    public function show(Message $message)
    {
        //
    }

    public function update(UpdateRequest $request, Message $message)
    {
        //
    }

    public function destroy(Message $message)
    {
        //
    }
}

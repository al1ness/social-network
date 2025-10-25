<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\Message\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();

        $messages = MessageResource::collection($messages)->resolve();

        return inertia('Client/Message/Index', compact('messages'));
    }
}

<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\Chat\ChatResource;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::all();

        $chats = ChatResource::collection($chats)->resolve();

        return inertia('Client/Chat/Index', compact('chats'));
    }
}

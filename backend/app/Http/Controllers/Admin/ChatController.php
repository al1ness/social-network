<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Chat\IndexRequest;
use App\Http\Requests\Admin\Chat\StoreRequest;
use App\Http\Resources\Chat\ChatResource;
use App\Models\Chat;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

class ChatController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $chats = ChatResource::collection(Chat::filter($data)->get())->resolve();

        if (Request::wantsJson()) {
            return $chats;
        }

        return inertia('Admin/Chat/Index', compact('chats'));
    }

    public function show(Chat $chat)
    {
        $chat = ChatResource::make($chat)->resolve();

        return inertia('Admin/Chat/Show', compact('chat'));
    }

    public function create()
    {
        return inertia('Admin/Chat/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $chat = Chat::create($data);

        return ChatResource::make($chat)->resolve();
    }

    public function destroy(Chat $chat)
    {
        $chat->delete();

        return response()->json([
            'message' => 'Chat deleted successfully'
        ], Response::HTTP_OK);
    }
}



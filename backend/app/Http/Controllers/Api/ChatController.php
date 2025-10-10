<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Chat\IndexRequest;
use App\Http\Requests\Api\Chat\StoreRequest;
use App\Http\Requests\Api\Chat\UpdateRequest;
use App\Http\Resources\Chat\ChatResource;
use App\Models\Chat;
use App\Services\ChatService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;


class ChatController extends Controller
{
    public function index(IndexRequest $request): array
    {
        $data = $request->validated();

        $chats = Chat::filter($data)->get();

        return ChatResource::collection($chats)->resolve();
    }

    public function store(StoreRequest $request): array
    {
        $data = $request->validated();

        $chat = Chat::create($data);

        return ChatResource::make($chat)->resolve();
    }

    public function show(Chat $chat): array
    {
        return ChatResource::make($chat)->resolve();
    }

    public function update(Chat $chat, UpdateRequest $request): array
    {
        $data = $request->validated();

        $chat = ChatService::update($chat, $data);

        return ChatResource::make($chat)->resolve();
    }

    public function destroy(Chat $chat): JsonResponse
    {
        $chat->delete();

        return response()->json([
            'message' => 'Chat deleted'
        ], Response::HTTP_OK);
    }
}

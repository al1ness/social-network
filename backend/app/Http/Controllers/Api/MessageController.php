<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Message\StoreRequest;
use App\Http\Requests\Api\Message\UpdateRequest;
use App\Http\Resources\Message\MessageResource;
use App\Models\Message;
use App\Services\MessageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    public function index(): array
    {
        return MessageResource::collection(Message::all())->resolve();
    }

    public function store(StoreRequest $request): array
    {
        $data = $request->validated();
        $message = Message::create($data);
        return MessageResource::make($message)->resolve();
    }

    public function show(Message $message): array
    {
        return MessageResource::make($message)->resolve();
    }

    public function update(Message $message, UpdateRequest $request): array
    {
        $data = $request->validated();
        $message = MessageService::update($message, $data);
        return MessageResource::make($message)->resolve();
    }

    public function destroy(Message $message): JsonResponse
    {
        $message->delete();

        return response()->json([
            'message' => 'Message deleted'
        ], Response::HTTP_OK);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Message\IndexRequest;
use App\Http\Requests\Admin\Message\StoreRequest;
use App\Http\Resources\Message\MessageResource;
use App\Models\Message;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

class MessageController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $messages = MessageResource::collection(Message::filter($data)->get())->resolve();

        if (Request::wantsJson()) {
            return $messages;
        }

        return inertia('Admin/Message/Index', compact('messages'));
    }

    public function show(Message $message)
    {
        $message = MessageResource::make($message)->resolve();

        return inertia('Admin/Message/Show', compact('message'));
    }

    public function create()
    {
        return inertia('Admin/Message/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $message = Message::create($data);

        return MessageResource::make($message)->resolve();
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return response()->json([
            'message' => 'Message deleted successfully'
        ], Response::HTTP_OK);
    }
}

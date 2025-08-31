<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Like\StoreRequest;
use App\Http\Requests\Api\Like\UpdateRequest;
use App\Http\Resources\Like\LikeResource;
use App\Models\Like;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class LikeController extends Controller
{
    public function index(): array
    {
        return LikeResource::collection(Like::all())->resolve();
    }

    public function store(StoreRequest $request): array
    {
        $data = $request->validated();
        $like = Like::create($data);
        return LikeResource::make($like)->resolve();
    }

    public function show(Like $like): array
    {
        return LikeResource::make($like)->resolve();
    }

    public function destroy(Like $like): JsonResponse
    {
        $like->delete();

        return response()->json([
            'message' => 'Like deleted'
        ], Response::HTTP_OK);
    }
}

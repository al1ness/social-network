<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Follow\StoreRequest;
use App\Http\Requests\Api\Follow\UpdateRequest;
use App\Http\Resources\Follow\FollowResource;
use App\Models\Follow;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class FollowController extends Controller
{
    public function index(): array
    {
        return FollowResource::collection(Follow::all())->resolve();
    }

    public function store(StoreRequest $request): array
    {
        $data = $request->validated();
        $follow = Follow::create($data);
        return FollowResource::make($follow)->resolve();
    }

    public function show(Follow $follow): array
    {
        return FollowResource::make($follow)->resolve();
    }

    public function destroy(Follow $follow): JsonResponse
    {
        $follow->delete();

        return response()->json([
            'message' => 'Unfollow'
        ], Response::HTTP_OK);
    }
}

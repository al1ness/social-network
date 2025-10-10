<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\IndexRequest;
use App\Http\Requests\Api\Profile\StoreRequest;
use App\Http\Requests\Api\Profile\UpdateRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use App\Services\ProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    public function index(IndexRequest $request): array
    {
        $data = $request->validated();

        $profiles = Profile::filter($data)->get();

        return ProfileResource::collection($profiles)->resolve();
    }

    public function store(StoreRequest $request): array
    {
        $data = $request->validated();

        $profile = Profile::create($data);

        return ProfileResource::make($profile)->resolve();
    }

    public function show(Profile $profile): array
    {
        return ProfileResource::make($profile)->resolve();
    }

    public function update(Profile $profile, UpdateRequest $request): array
    {
        $data = $request->validated();

        $profile = ProfileService::update($profile, $data);

        return ProfileResource::make($profile)->resolve();
    }

    public function destroy(Profile $profile): JsonResponse
    {
        $profile->delete();

        return response()->json([
            'message' => 'Profile deleted'
        ], Response::HTTP_OK);
    }
}

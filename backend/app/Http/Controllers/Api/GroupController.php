<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Group\IndexRequest;
use App\Http\Requests\Api\Group\StoreRequest;
use App\Http\Requests\Api\Group\UpdateRequest;
use App\Http\Resources\Group\GroupResource;
use App\Models\Group;
use App\Services\GroupService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class GroupController extends Controller
{
    public function index(IndexRequest $request): array
    {
        $data = $request->validated();

        $groups = Group::filter($data)->get();

        return GroupResource::collection($groups)->resolve();
    }

    public function store(StoreRequest $request): array
    {
        $data = $request->validated();

        $group = Group::create($data);

        return GroupResource::make($group)->resolve();
    }

    public function show(Group $group): array
    {
        return GroupResource::make($group)->resolve();
    }

    public function update(Group $group, UpdateRequest $request): array
    {
        $data = $request->validated();

        $group = GroupService::update($group, $data);

        return GroupResource::make($group)->resolve();
    }

    public function destroy(Group $group): JsonResponse
    {
        $group->delete();

        return response()->json([
            'message' => 'Group deleted'
        ], Response::HTTP_OK);
    }
}

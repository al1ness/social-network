<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Role\StoreRequest;
use App\Http\Requests\Api\Role\UpdateRequest;
use App\Http\Resources\Role\RoleResource;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    public function index(): array
    {
        return RoleResource::collection(Role::all())->resolve();
    }

    public function store(StoreRequest $request): array
    {
        $data = $request->validated();

        $role = Role::create($data);

        return RoleResource::make($role)->resolve();
    }

    public function show(Role $role): array
    {
        return RoleResource::make($role)->resolve();
    }

    public function update(Role $role, UpdateRequest $request): array
    {
        $data = $request->validated();

        $role = RoleService::update($role, $data);

        return RoleResource::make($role)->resolve();
    }

    public function destroy(Role $role): JsonResponse
    {
        $role->delete();

        return response()->json([
            'message' => 'Role deleted'
        ], Response::HTTP_OK);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Group\IndexRequest;
use App\Http\Requests\Admin\Group\StoreRequest;
use App\Http\Resources\Group\GroupResource;
use App\Models\Group;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

class GroupController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $groups = GroupResource::collection(Group::filter($data)->get())->resolve();

        if (Request::wantsJson()) {
            return $groups;
        }

        return inertia('Admin/Group/Index', compact('groups'));
    }

    public function show(Group $group)
    {
        $group = GroupResource::make($group)->resolve();

        return inertia('Admin/Group/Show', compact('group'));
    }

    public function create()
    {
        return inertia('Admin/Group/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $group = Group::create($data);

        return GroupResource::make($group)->resolve();
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return response()->json([
            'message' => 'Group deleted successfully'
        ], Response::HTTP_OK);
    }
}

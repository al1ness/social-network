<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Group\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();

        $groups = GroupResource::collection($groups)->resolve();

        return inertia('Admin/Group/Index', compact('groups'));
    }

    public function show(Group $group)
    {
        $group = GroupResource::make($group)->resolve();

        return inertia('Admin/Group/Show', compact('group'));
    }
}

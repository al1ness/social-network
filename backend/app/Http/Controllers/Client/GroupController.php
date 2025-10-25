<?php

namespace App\Http\Controllers\Client;

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

        return inertia('Client/Group/Index', compact('groups'));
    }
}

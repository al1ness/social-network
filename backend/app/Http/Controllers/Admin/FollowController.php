<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Follow\FollowResource;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function index()
    {
        $follows = Follow::all();

        $follows = FollowResource::collection($follows)->resolve();

        return inertia('Admin/Follow/Index', compact('follows'));
    }
}

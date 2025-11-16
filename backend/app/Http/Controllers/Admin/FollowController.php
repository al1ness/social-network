<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Follow\FollowResource;
use App\Models\Follow;
use Illuminate\Http\Response;

class FollowController extends Controller
{
    public function index()
    {
        $follows = Follow::all();

        $follows = FollowResource::collection($follows)->resolve();

        return inertia('Admin/Follow/Index', compact('follows'));
    }

    public function show(Follow $follow)
    {
        $follow = FollowResource::make($follow)->resolve();

        return inertia('Admin/Follow/Show', compact('follow'));
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function destroy(Follow $follow)
    {
        $follow->delete();

        return response()->json([
            'message' => 'Follow deleted successfully'
        ], Response::HTTP_OK);
    }
}

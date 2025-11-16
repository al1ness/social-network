<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Like\LikeResource;
use App\Models\Like;
use Illuminate\Http\Response;

class LikeController extends Controller
{
    public function index()
    {
        $likes = Like::all();

        $likes = LikeResource::collection($likes)->resolve();

        return inertia('Admin/Like/Index', compact('likes'));
    }

    public function show(Like $like)
    {
        $like = LikeResource::make($like)->resolve();
        return inertia('Admin/Like/Show', compact('like'));
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function destroy(Like $like)
    {
        $like->delete();

        return response()->json([
            'message' => 'Like deleted successfully'
        ], Response::HTTP_OK);
    }
}

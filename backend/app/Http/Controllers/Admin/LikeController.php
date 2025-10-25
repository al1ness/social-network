<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Like\LikeResource;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index()
    {
        $likes = Like::all();

        $likes = LikeResource::collection($likes)->resolve();

        return inertia('Admin/Like/Index', compact('likes'));
    }
}

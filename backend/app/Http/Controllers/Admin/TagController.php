<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        $tags = TagResource::collection($tags)->resolve();

        return inertia('Admin/Tag/Index', compact('tags'));
    }
}

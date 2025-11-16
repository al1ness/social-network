<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\IndexRequest;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

class TagController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $tags = TagResource::collection(Tag::filter($data)->get())->resolve();

        if (Request::wantsJson()) {
            return $tags;
        }

        return inertia('Admin/Tag/Index', compact('tags'));
    }

    public function show(Tag $tag)
    {
        $tag = TagResource::make($tag)->resolve();

        return inertia('Admin/Tag/Show', compact('tag'));
    }

    public function create()
    {
        return inertia('Admin/Tag/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $tag = Tag::create($data);

        return TagResource::make($tag)->resolve();
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json([
            'message' => 'Tag deleted successfully'
        ], Response::HTTP_OK);
    }
}

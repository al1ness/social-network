<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TagController extends Controller
{
    public function index(): array
    {
        return TagResource::collection(Tag::all())->resolve();
    }

    public function store(): JsonResponse
    {
        Tag::create([
            'title' => 'MostPopularTag',
            'slug' => 'most_popular_tag'
        ]);

        return response()->json([
            'message' => 'Tag created'
        ], Response::HTTP_OK);
    }

    public function show(Tag $tag)
    {
        return TagResource::make($tag)->resolve();
    }

    public function update(Tag $tag)
    {
        $tag->update([
            'title' => 'TopTag',
            'slug' => 'top_tag'
        ]);

        return TagResource::make($tag)->resolve();
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json([
            'message' => 'Tag deleted'
        ], Response::HTTP_OK);
    }
}

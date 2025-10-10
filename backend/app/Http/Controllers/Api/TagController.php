<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Tag\IndexRequest;
use App\Http\Requests\Api\Tag\StoreRequest;
use App\Http\Requests\Api\Tag\UpdateRequest;
use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TagController extends Controller
{
    public function index(IndexRequest $request): array
    {
        $data = $request->validated();

        $tags = Tag::filter($data)->get();

        return TagResource::collection($tags)->resolve();
    }

    public function store(StoreRequest $request): array
    {
        $data = $request->validated();

        $tag = Tag::create($data);

        return TagResource::make($tag)->resolve();
    }

    public function show(Tag $tag): array
    {
        return TagResource::make($tag)->resolve();
    }

    public function update(Tag $tag, UpdateRequest $request): array
    {
        $data = $request->validated();

        $tag = TagService::update($tag, $data);

        return TagResource::make($tag)->resolve();
    }

    public function destroy(Tag $tag): JsonResponse
    {
        $tag->delete();

        return response()->json([
            'message' => 'Tag deleted'
        ], Response::HTTP_OK);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Video\IndexRequest;
use App\Http\Requests\Api\Video\StoreRequest;
use App\Http\Requests\Api\Video\UpdateRequest;
use App\Http\Resources\Video\VideoResource;
use App\Models\Video;
use App\Services\VideoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class VideoController extends Controller
{
    public function index(IndexRequest $request): array
    {
        $videos = Video::all();

        return VideoResource::collection($videos)->resolve();
    }

    public function store(StoreRequest $request): array
    {
        $data = $request->validated();

        $video = Video::create($data);

        return VideoResource::make($video)->resolve();
    }

    public function show(Video $video): array
    {
        return VideoResource::make($video)->resolve();
    }

    public function update(Video $video, UpdateRequest $request): array
    {
        $data = $request->validated();

        $video = VideoService::update($video, $data);

        return VideoResource::make($video)->resolve();
    }

    public function destroy(Video $video): JsonResponse
    {
        $video->delete();

        return response()->json([
            'message' => 'Video deleted'
        ], Response::HTTP_OK);
    }
}

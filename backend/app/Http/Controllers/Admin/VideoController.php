<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Video\IndexRequest;
use App\Http\Requests\Admin\Video\StoreRequest;
use App\Http\Resources\Video\VideoResource;
use App\Models\Video;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

class VideoController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $videos = VideoResource::collection(Video::filter($data)->get())->resolve();

        if (Request::wantsJson()) {
            return $videos;
        }

        return inertia('Admin/Video/Index', compact('videos'));
    }

    public function show(Video $video)
    {
        $video = VideoResource::make($video)->resolve();

        return inertia('Admin/Video/Show', compact('video'));
    }

    public function create()
    {
        return inertia('Admin/Video/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $video = Video::create($data);

        return VideoResource::make($video)->resolve();
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return response()->json([
            'message' => 'Video deleted successfully'
        ], Response::HTTP_OK);
    }
}

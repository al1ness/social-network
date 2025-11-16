<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\Video\VideoResource;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();

        $videos = VideoResource::collection($videos)->resolve();

        return inertia('Client/Video/Index', compact('videos'));
    }

    public function show(Video $video)
    {
        $video = VideoResource::make($video)->resolve();

        return inertia('Client/Video/Show', compact('video'));
    }
}

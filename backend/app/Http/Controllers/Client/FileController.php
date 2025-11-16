<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\File\FileResource;
use App\Http\Resources\Video\VideoResource;
use App\Models\File;
use App\Models\Video;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();

        $files = FileResource::collection($files)->resolve();

        return inertia('Client/File/Index', compact('files'));
    }

    public function show(File $file)
    {
        $file = FileResource::make($file)->resolve();

        return inertia('Client/File/Show', compact('file'));
    }
}

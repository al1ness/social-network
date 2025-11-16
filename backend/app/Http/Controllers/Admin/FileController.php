<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\File\IndexRequest;
use App\Http\Requests\Admin\File\StoreRequest;
use App\Http\Resources\File\FileResource;
use App\Models\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

class FileController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $files = FileResource::collection(File::filter($data)->get())->resolve();

        if (Request::wantsJson()) {
            return $files;
        }

        return inertia('Admin/File/Index', compact('files'));
    }

    public function show(File $file)
    {
        $file = FileResource::make($file)->resolve();

        return inertia('Admin/File/Show', compact('file'));
    }

    public function create()
    {
        return inertia('Admin/File/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $file = File::create($data);

        return FileResource::make($file)->resolve();
    }

    public function destroy(File $file)
    {
        $file->delete();

        return response()->json([
            'message' => 'File deleted successfully'
        ], Response::HTTP_OK);
    }
}

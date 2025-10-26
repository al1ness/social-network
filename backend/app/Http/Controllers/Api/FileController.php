<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\File\IndexRequest;
use App\Http\Requests\Api\File\StoreRequest;
use App\Http\Requests\Api\File\UpdateRequest;
use App\Http\Resources\File\FileResource;
use App\Models\File;
use App\Services\FileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FileController extends Controller
{
    public function index(IndexRequest $request): array
    {
        $files = File::all();

        return FileResource::collection($files)->resolve();
    }

    public function store(StoreRequest $request): array
    {
        $data = $request->validated();

        $file = File::create($data);

        return FileResource::make($file)->resolve();
    }

    public function show(File $file): array
    {
        return FileResource::make($file)->resolve();
    }

    public function update(File $file, UpdateRequest $request): array
    {
        $data = $request->validated();

        $file = FileService::update($file, $data);

        return FileResource::make($file)->resolve();
    }

    public function destroy(File $file): JsonResponse
    {
        $file->delete();

        return response()->json([
            'message' => 'File deleted'
        ], Response::HTTP_OK);
    }
}

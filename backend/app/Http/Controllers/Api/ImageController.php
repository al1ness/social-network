<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Image\StoreRequest;
use App\Http\Requests\Api\Image\UpdateRequest;
use App\Http\Resources\Image\ImageResource;
use App\Models\Image;
use App\Services\ImageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ImageController extends Controller
{
    public function index(): array
    {
        $images = Image::all();

        return ImageResource::collection($images)->resolve();
    }

    public function store(StoreRequest $request): array
    {
        $data = $request->validated();

        $image = Image::create($data);

        return ImageResource::make($image)->resolve();
    }

    public function show(Image $image): array
    {
        return ImageResource::make($image)->resolve();
    }

    public function update(Image $image, UpdateRequest $request): array
    {
        $data = $request->validated();

        $image = ImageService::update($image, $data);

        return ImageResource::make($image)->resolve();
    }

    public function destroy(Image $image): JsonResponse
    {
        $image->delete();

        return response()->json([
            'message' => 'Image deleted'
        ], Response::HTTP_OK);
    }
}

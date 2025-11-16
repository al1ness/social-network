<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Image\StoreRequest;
use App\Http\Resources\Image\ImageResource;
use App\Models\Image;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();

        $images = ImageResource::collection($images)->resolve();

        return inertia('Admin/Image/Index', compact('images'));
    }

    public function show(Image $image)
    {
        $image = ImageResource::make($image)->resolve();

        return inertia('Admin/Image/Show', compact('image'));
    }

    public function create()
    {
        return inertia('Admin/Image/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $image = Image::create($data);

        return ImageResource::make($image)->resolve();
    }

    public function destroy(Image $image)
    {
        $image->delete();
        Storage::disk('s3')->delete($image->file_path);

        return response()->json([
            'message' => 'Image deleted successfully'
        ], Response::HTTP_OK);
    }
}

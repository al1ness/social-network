<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\Image\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();

        $images = ImageResource::collection($images)->resolve();

        return inertia('Client/Image/Index', compact('images'));
    }

    public function show(Image $image)
    {
        $image = ImageResource::make($image)->resolve();

        return inertia('Client/Image/Show', compact('image'));
    }
}

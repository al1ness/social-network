<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\IndexRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $categories = CategoryResource::collection($categories)->resolve();

        return inertia('Client/Category/Index', compact('categories'));
    }
}

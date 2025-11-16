<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\IndexRequest;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

class CategoryController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $categories = CategoryResource::collection(Category::filter($data)->get())->resolve();

        if (Request::wantsJson()) {
            return $categories;
        }

        return inertia('Admin/Category/Index', compact('categories'));
    }

    public function show(Category $category)
    {
        $category = CategoryResource::make($category)->resolve();

        return inertia('Admin/Category/Show', compact('category'));
    }

    public function create()
    {
        return inertia('Admin/Category/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $category = Category::create($data);

        return CategoryResource::make($category)->resolve();
    }

    public function edit(Category $category)
    {
        return inertia('Admin/Category/Edit', compact('category'));
    }

    public function update(Category $category, UpdateRequest $request)
    {
        $data = $request->validated();

        $category = CategoryService::update($category, $data);

        return CategoryResource::make($category)->resolve();
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully'
        ], Response::HTTP_OK);
    }
}

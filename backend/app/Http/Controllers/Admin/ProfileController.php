<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\IndexRequest;
use App\Http\Requests\Admin\Profile\StoreRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

class ProfileController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $profiles = ProfileResource::collection(Profile::filter($data)->get())->resolve();

        if (Request::wantsJson()) {
            return $profiles;
        }

        return inertia('Admin/Profile/Index', compact('profiles'));
    }

    public function show(Profile $profile)
    {
        $profile = ProfileResource::make($profile)->resolve();

        return inertia('Admin/Profile/Show', compact('profile'));
    }

    public function create()
    {
        return inertia('Admin/Profile/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $profile = Profile::create($data);

        return ProfileResource::make($profile)->resolve();
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();

        return response()->json([
            'message' => 'Profile deleted successfully'
        ], Response::HTTP_OK);
    }
}

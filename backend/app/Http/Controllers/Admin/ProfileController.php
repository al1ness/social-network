<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();

        $profiles = ProfileResource::collection($profiles)->resolve();

        return inertia('Admin/Profile/Index', compact('profiles'));
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Follow\StoreFollowRequest;
use App\Http\Requests\Follow\UpdateFollowRequest;
use App\Models\Follow;

class FollowController extends Controller
{
    public function index()
    {
        //
    }

    public function store(StoreFollowRequest $request)
    {
        //
    }

    public function show(Follow $follow)
    {
        //
    }

    public function update(UpdateFollowRequest $request, Follow $follow)
    {
        //
    }

    public function destroy(Follow $follow)
    {
        //
    }
}

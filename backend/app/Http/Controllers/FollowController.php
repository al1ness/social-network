<?php

namespace App\Http\Controllers;

use App\Http\Requests\Follow\StoreFollowRequest;
use App\Http\Requests\Follow\UpdateFollowRequest;
use App\Models\Follow;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFollowRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Follow $follow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFollowRequest $request, Follow $follow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Follow $follow)
    {
        //
    }
}

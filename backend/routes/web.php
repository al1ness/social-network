<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('posts')->group(function () {
    Route::get('/index', [PostController::class, 'index']);
    Route::get('/store', [PostController::class, 'store']);
    Route::get('/{post}/update', [PostController::class, 'update']);
    Route::get('/{post}/destroy', [PostController::class, 'destroy']);
    Route::get('/{post}', [PostController::class, 'show']);
});

Route::prefix('tags')->group(function () {
    Route::get('/index', [TagController::class, 'index']);
    Route::get('/store', [TagController::class, 'store']);
    Route::get('/{tag}/update', [TagController::class, 'update']);
    Route::get('/{tag}/destroy', [TagController::class, 'destroy']);
    Route::get('/{tag}', [TagController::class, 'show']);
});

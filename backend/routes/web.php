<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts/index', [PostController::class, 'index']);
Route::get('/posts/store', [PostController::class, 'store']);
Route::get('/posts/{post}/update', [PostController::class, 'update']);
Route::get('/posts/{post}/destroy', [PostController::class, 'destroy']);
Route::get('/posts/{post}', [PostController::class, 'show']);


<?php

use App\Http\Controllers\Api\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CategoryController;

Route::prefix('posts')->group(function () {
    Route::get('', [PostController::class, 'index']);
    Route::post('', [PostController::class, 'store']);
    Route::get('/{post}', [PostController::class, 'show']);
    Route::patch('/{post}', [PostController::class, 'update']);
    Route::delete('/{post}', [PostController::class, 'destroy']);
});

Route::resource('tags', TagController::class);
Route::resource('chats', ChatController::class);
Route::resource('follows', FollowController::class);
Route::resource('comments', CommentController::class);
Route::resource('categories', CategoryController::class);


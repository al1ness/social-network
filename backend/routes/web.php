<?php

use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\ChatController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Client\FollowController;
use App\Http\Controllers\Client\GroupController;
use App\Http\Controllers\Client\LikeController;
use App\Http\Controllers\Client\MessageController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\TagController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('categories', [CategoryController::class, 'index']);
Route::get('chats', [ChatController::class, 'index']);
Route::get('comments', [CommentController::class, 'index']);
Route::get('follows', [FollowController::class , 'index']);
Route::get('groups', [GroupController::class, 'index']);
Route::get('likes', [LikeController::class , 'index']);
Route::get('messages', [MessageController::class , 'index']);
Route::get('posts', [PostController::class, 'index']);
Route::get('profiles', [ProfileController::class , 'index']);
Route::get('tags', [TagController::class , 'index']);

require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';

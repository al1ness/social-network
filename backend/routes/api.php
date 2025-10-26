<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TagController;
use App\Http\Middleware\CheckPermissionMiddleware;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CategoryController;


Route::post('auth/login', [AuthController::class, 'login']);
Route::group(['middleware' => 'jwt.auth', 'prefix' => 'auth'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['middleware' => ['jwt.auth', CheckPermissionMiddleware::class]], function () {
    Route::apiResource('posts', PostController::class);
    Route::apiResource('chats', ChatController::class);
    Route::apiResource('comments', CommentController::class);
});

//Route::prefix('posts')->group(function () {
//    Route::get('', [PostController::class, 'index']);
//    Route::post('', [PostController::class, 'store']);
//    Route::get('/{post}', [PostController::class, 'show']);
//    Route::patch('/{post}', [PostController::class, 'update']);
//    Route::delete('/{post}', [PostController::class, 'destroy']);
//});





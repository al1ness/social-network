<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\FollowController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\LikeController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\VideoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('categories/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');

    Route::get('chats', [ChatController::class, 'index'])->name('admin.chats.index');
    Route::get('chats/{chat}', [ChatController::class, 'show'])->name('admin.chats.show');

    Route::get('comments', [CommentController::class, 'index'])->name('admin.comments.index');
    Route::get('comments/{comment}', [CommentController::class, 'show'])->name('admin.comments.show');

    Route::get('files', [FileController::class, 'index'])->name('admin.files.index');
    Route::get('files/{file}', [FileController::class, 'show'])->name('admin.files.show');

    Route::get('follows', [FollowController::class, 'index'])->name('admin.follows.index');
    Route::get('follows/{follow}', [FollowController::class, 'show'])->name('admin.follows.show');

    Route::get('groups', [GroupController::class, 'index'])->name('admin.groups.index');
    Route::get('groups/{group}', [GroupController::class, 'show'])->name('admin.groups.show');

    Route::get('images', [ImageController::class, 'index'])->name('admin.images.index');
    Route::get('images/{image}', [ImageController::class, 'show'])->name('admin.images.show');

    Route::get('likes', [LikeController::class, 'index'])->name('admin.likes.index');
    Route::get('likes/{like}', [LikeController::class, 'show'])->name('admin.likes.show');

    Route::get('messages', [MessageController::class, 'index'])->name('admin.messages.index');
    Route::get('messages/{message}', [MessageController::class, 'show'])->name('admin.messages.show');

    Route::get('posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('admin.posts.show');

    Route::get('profiles', [ProfileController::class, 'index'])->name('admin.profiles.index');
    Route::get('profiles/{profile}', [ProfileController::class, 'show'])->name('admin.profiles.show');

    Route::get('tags', [TagController::class, 'index'])->name('admin.tags.index');
    Route::get('tags/{tag}', [TagController::class, 'show'])->name('admin.tags.show');

    Route::get('videos', [VideoController::class, 'index'])->name('admin.videos.index');
    Route::get('videos/{video}', [VideoController::class, 'show'])->name('admin.videos.show');
});

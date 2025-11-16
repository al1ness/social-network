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
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdminMiddleware::class]], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::get('categories/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::post('categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::patch('categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('chats', [ChatController::class, 'index'])->name('admin.chats.index');
    Route::get('chats/create', [ChatController::class, 'create'])->name('admin.chats.create');
    Route::get('chats/{chat}', [ChatController::class, 'show'])->name('admin.chats.show');
    Route::get('chats/{chat}/edit', [ChatController::class, 'edit'])->name('admin.chats.edit');
    Route::post('chats', [ChatController::class, 'store'])->name('admin.chats.store');
    Route::patch('chats/{chat}', [ChatController::class, 'update'])->name('admin.chats.update');
    Route::delete('chats/{chat}', [ChatController::class, 'destroy'])->name('admin.chats.destroy');

    Route::get('comments', [CommentController::class, 'index'])->name('admin.comments.index');
    Route::get('comments/create', [CommentController::class, 'create'])->name('admin.comments.create');
    Route::get('comments/{comment}', [CommentController::class, 'show'])->name('admin.comments.show');
    Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])->name('admin.comments.edit');
    Route::post('comments', [CommentController::class, 'store'])->name('admin.comments.store');
    Route::patch('comments/{comment}', [CommentController::class, 'update'])->name('admin.comments.update');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('admin.comments.destroy');

    Route::get('files', [FileController::class, 'index'])->name('admin.files.index');
    Route::get('files/create', [FileController::class, 'create'])->name('admin.files.create');
    Route::get('files/{file}', [FileController::class, 'show'])->name('admin.files.show');
    Route::get('files/{file}/edit', [FileController::class, 'edit'])->name('admin.files.edit');
    Route::post('files', [FileController::class, 'store'])->name('admin.files.store');
    Route::patch('files/{file}', [FileController::class, 'update'])->name('admin.files.update');
    Route::delete('files/{file}', [FileController::class, 'destroy'])->name('admin.files.destroy');

    Route::get('follows', [FollowController::class, 'index'])->name('admin.follows.index');
    Route::get('follows/create', [FollowController::class, 'create'])->name('admin.follows.create');
    Route::get('follows/{follow}', [FollowController::class, 'show'])->name('admin.follows.show');
    Route::get('follows/{follow}/edit', [FollowController::class, 'edit'])->name('admin.follows.edit');
    Route::post('follows', [FollowController::class, 'store'])->name('admin.follows.store');
    Route::patch('follows/{follow}', [FollowController::class, 'update'])->name('admin.follows.update');
    Route::delete('follows/{follow}', [FollowController::class, 'destroy'])->name('admin.follows.destroy');

    Route::get('groups', [GroupController::class, 'index'])->name('admin.groups.index');
    Route::get('groups/create', [GroupController::class, 'create'])->name('admin.groups.create');
    Route::get('groups/{group}', [GroupController::class, 'show'])->name('admin.groups.show');
    Route::get('groups/{group}/edit', [GroupController::class, 'edit'])->name('admin.groups.edit');
    Route::post('groups', [GroupController::class, 'store'])->name('admin.groups.store');
    Route::patch('groups/{group}', [GroupController::class, 'update'])->name('admin.groups.update');

    Route::get('images', [ImageController::class, 'index'])->name('admin.images.index');
    Route::get('images/create', [ImageController::class, 'create'])->name('admin.images.create');
    Route::get('images/{image}', [ImageController::class, 'show'])->name('admin.images.show');
    Route::get('images/{image}/edit', [ImageController::class, 'edit'])->name('admin.images.edit');
    Route::post('images', [ImageController::class, 'store'])->name('admin.images.store');
    Route::patch('images/{image}', [ImageController::class, 'update'])->name('admin.images.update');
    Route::delete('images/{image}', [ImageController::class, 'destroy'])->name('admin.images.destroy');

    Route::get('likes', [LikeController::class, 'index'])->name('admin.likes.index');
    Route::get('likes/create', [LikeController::class, 'create'])->name('admin.likes.create');
    Route::get('likes/{like}', [LikeController::class, 'show'])->name('admin.likes.show');
    Route::get('likes/{like}/edit', [LikeController::class, 'edit'])->name('admin.likes.edit');
    Route::post('likes', [LikeController::class, 'store'])->name('admin.likes.store');
    Route::patch('likes/{like}', [LikeController::class, 'update'])->name('admin.likes.update');
    Route::delete('likes/{like}', [LikeController::class, 'destroy'])->name('admin.likes.destroy');

    Route::get('messages', [MessageController::class, 'index'])->name('admin.messages.index');
    Route::get('messages/create', [MessageController::class, 'create'])->name('admin.messages.create');
    Route::get('messages/{message}', [MessageController::class, 'show'])->name('admin.messages.show');
    Route::get('messages/{message}/edit', [MessageController::class, 'edit'])->name('admin.messages.edit');
    Route::post('messages', [MessageController::class, 'store'])->name('admin.messages.store');
    Route::patch('messages/{message}', [MessageController::class, 'update'])->name('admin.messages.update');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');

    Route::get('posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('admin.posts.show');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::patch('posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::post('posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');

    Route::get('profiles', [ProfileController::class, 'index'])->name('admin.profiles.index');
    Route::get('profiles/create', [ProfileController::class, 'create'])->name('admin.profiles.create');
    Route::get('profiles/{profile}', [ProfileController::class, 'show'])->name('admin.profiles.show');
    Route::get('profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('admin.profiles.edit');
    Route::post('profiles', [ProfileController::class, 'store'])->name('admin.profiles.store');
    Route::patch('profiles/{profile}', [ProfileController::class, 'update'])->name('admin.profiles.update');
    Route::delete('profiles/{profile}', [ProfileController::class, 'destroy'])->name('admin.profiles.destroy');

    Route::get('tags', [TagController::class, 'index'])->name('admin.tags.index');
    Route::get('tags/create', [TagController::class, 'create'])->name('admin.tags.create');
    Route::get('tags/{tag}', [TagController::class, 'show'])->name('admin.tags.show');
    Route::get('tags/{tag}/edit', [TagController::class, 'edit'])->name('admin.tags.edit');
    Route::post('tags', [TagController::class, 'store'])->name('admin.tags.store');
    Route::patch('tags/{tag}', [TagController::class, 'update'])->name('admin.tags.update');
    Route::delete('tags/{tag}', [TagController::class, 'destroy'])->name('admin.tags.destroy');

    Route::get('videos', [VideoController::class, 'index'])->name('admin.videos.index');
    Route::get('videos/create', [VideoController::class, 'create'])->name('admin.videos.create');
    Route::get('videos/{video}', [VideoController::class, 'show'])->name('admin.videos.show');
    Route::get('videos/{video}/edit', [VideoController::class, 'edit'])->name('admin.videos.edit');
    Route::post('videos', [VideoController::class, 'store'])->name('admin.videos.store');
    Route::patch('videos/{video}', [VideoController::class, 'update'])->name('admin.videos.update');
    Route::delete('videos/{video}', [VideoController::class, 'destroy'])->name('admin.videos.destroy');
});

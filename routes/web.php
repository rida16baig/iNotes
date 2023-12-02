<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::get('/dashboard', function () { return view('dashboard');})->middleware('auth');
Route::get('/', function () { return view('welcome_page');});

///iNOTES route



Route::middleware(['auth'])->group(function () {
    // Routes that require authentication
    Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/posts/create', [PostController::class, 'store'])->name('post.store');
    Route::get('/posts/read', [PostController::class, 'read'])->name('post.read');
    Route::delete('/posts/{id}/delete', [PostController::class, 'delete'])->name('post.delete');

    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/posts/{id}/update', [PostController::class, 'update'])->name('post.update');
    Route::get('/posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
    Route::delete('/posts/{id}/forceDelete', [PostController::class, 'forceDelete'])->name('post.forceDelete');
    Route::get('/posts/{id}/restore', [PostController::class, 'restore'])->name('post.restore');
    Route::get('/posts/deleteAll', [PostController::class, 'deleteAll'])->name('post.deleteAll');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});


Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/register',[AuthController::class,'register'])->name('register');



Route::post('/login',[AuthController::class,'login_post'])->name('login_post');
Route::post('/register',[AuthController::class,'register_post'])->name('register_post');
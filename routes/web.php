<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\Backend\IndexController;
use App\Http\Controllers\Backend\ReplyController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\CategoryController;

//clear cached data
Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return 'Cache, complied, config, events, routes, views Cleared';
});

//Register User Rout
Route::get('/register',[RegisterUserController::class,'index'])->name('register');
Route::post('/store/user',[RegisterUserController::class,'store'])->name('store.user');
// Auth Route
Route::get('/login',[LoginUserController::class,'index'])->name('login');
Route::post('/login',[LoginUserController::class,'login'])->name('auth.login');
Route::post('/logout',[LoginUserController::class,'logout'])->name('logout');

//frontend route
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/post/detail/{id}',[HomeController::class,'postDetail'])->name('post.detail');

// Comment Route
Route::middleware(['auth'])->group(function () {
    Route::post('/store/comment',[CommentController::class,'store'])->name('store.comment');
    Route::post('/update/comment',[CommentController::class,'update'])->name('update.comment');
});

// Reply Route
Route::middleware(['auth'])->group(function () {
    Route::post('/store/reply',[ReplyController::class,'store'])->name('store.reply');
});

// Dashboard Route
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[IndexController::class,'index'])->name('dashboard');
});

// Category Route
Route::middleware(['auth','roles:admin'])->group(function () {
    Route::get('/categories',[CategoryController::class,'index'])->name('categories');
    Route::get('/create/category',[CategoryController::class,'create'])->name('create.category');
    Route::post('/store/category',[CategoryController::class,'store'])->name('store.category');
    Route::get('/edit/category/{id}',[CategoryController::class,'edit'])->name('edit.category');
    Route::post('/update/category',[CategoryController::class,'update'])->name('update.category');
    Route::get('/delete/category/{id}',[CategoryController::class,'delete'])->name('delete.category');
});

// Post Route
Route::middleware(['auth'])->group(function () {
    Route::get('/posts',[PostController::class,'index'])->name('posts');
    Route::get('/create/post',[PostController::class,'create'])->name('create.post');
    Route::post('/store/post',[PostController::class,'store'])->name('store.post');
    Route::get('/edit/post/{id}',[PostController::class,'edit'])->name('edit.post');
    Route::post('/update/post',[PostController::class,'update'])->name('update.post');
    Route::get('/delete/post/{id}',[PostController::class,'delete'])->name('delete.post');
});

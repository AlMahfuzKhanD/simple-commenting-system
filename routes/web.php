<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\Backend\IndexController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/read', function () {
    return view('read-more');
});

//Register User Rout
Route::get('/register',[RegisterUserController::class,'index'])->name('register');
Route::post('/store/user',[RegisterUserController::class,'store'])->name('store.user');
// Auth Route
Route::get('/login',[LoginUserController::class,'index'])->name('login');
Route::post('/login',[LoginUserController::class,'login'])->name('auth.login');
Route::post('/logout',[LoginUserController::class,'logout'])->name('logout');

// Dashboard Route
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[IndexController::class,'index'])->name('dashboard');
});

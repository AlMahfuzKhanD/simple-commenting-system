<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\Backend\IndexController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/read', function () {
    return view('read-more');
});

// Auth Route
Route::get('/login',[LoginUserController::class,'index'])->name('login');
Route::post('/login',[LoginUserController::class,'login'])->name('auth.login');
Route::post('/logout',[LoginUserController::class,'logout'])->name('logout');

// Dashboard Route
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[IndexController::class,'index'])->name('dashboard');
});

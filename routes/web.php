<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// User routes
Route::resource('users', UserController::class);

// Role routes
Route::resource('roles', RoleController::class);


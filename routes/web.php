<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ESRBratingController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\EsportEventController;
use App\Http\Controllers\GameConsoleController;
use App\Http\Controllers\GameCreatorController;
use App\Http\Controllers\VideoGameController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Home page route
Route::get('/home', function () {
    return view('home'); // This route will render the home view
})->middleware('auth');

// Dashboard route with middleware for authentication and verification
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes grouped together
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // resource routes (CRUD operations)
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('developers', DeveloperController::class);
    Route::resource('publishers', PublisherController::class);
    Route::resource('esrb_ratings', ESRBratingController::class);
    Route::resource('game_consoles', GameConsoleController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('esport_events', EsportEventController::class);
    Route::resource('video_games', VideoGameController::class);
    Route::resource('game_creators', GameCreatorController::class);
});

// Include authentication routes
require __DIR__.'/auth.php';

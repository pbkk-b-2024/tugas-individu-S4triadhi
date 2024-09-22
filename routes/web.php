<?php

use App\Http\Controllers\{
    AwardsController,
    CategoryController,
    DeveloperController,
    GameConsoleController,
    GameController,
    PublisherController,
    UserController,
    RoleController,
    ProfileController,
};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route for the login page
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

// Route for registration page
Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest')->name('register');

// Route for the home page
Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

// Root route redirect based on authentication
Route::get('/', function () {
    return Auth::check() ? redirect()->route('home') : redirect()->route('login');
});

// Routes for profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return redirect()->route('home');
})->name('dashboard');


// Resource routes with authentication and verification middleware
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('awards', AwardsController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('developers', DeveloperController::class);
    Route::resource('game_consoles', GameConsoleController::class);
    Route::resource('games', GameController::class);
    Route::resource('publishers', PublisherController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
});

// Password reset routes (from auth.php)
require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(App\Http\Controllers\CategoryController::class)->group(function () {
    Route::get('categories', 'index');
    Route::get('categories/create', 'create');
    Route::post('categories/create', 'store');
    Route::get('categories/{id}/edit', 'edit');
    Route::put('categories/{id}/edit', 'update');
    Route::get('categories/{id}/delete', 'destroy');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\ParameterController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
})->name('home');

// Basic Routing
Route::get('/basic', function () {
    return view('routes.basic');
})->name('basic');

// Route Parameters
Route::get('/parameter/{param1?}/{param2?}', [ParameterController::class, 'index'])->name('parameter.index');
Route::post('/parameter/{param1?}/{param2?}', [ParameterController::class, 'store'])->name('parameter.update');

// Named Routes
Route::get('/named', function () {
    return view('routes.named');
})->name('named');

// Route Groups
Route::prefix('group')->group(function () {
    Route::get('/', function () {
        return view('routes.group');
    })->name('group');
    Route::get('/page1', function () {
        return view('routes.group1');
    })->name('group.page1');
    Route::get('/page2', function () {
        return view('routes.group2');
    })->name('group.page2');
});


// Number Routes
Route::get('/number', [NumberController::class, 'index'])->name('number.index');
Route::post('/number/calculate', function (Request $request) {
    $operation = $request->input('operation');
    $n = $request->input('n');

    if ($operation === 'genapGanjil') {
        return app(NumberController::class)->genapGanjil($request);
    } elseif ($operation === 'fibonacci') {
        return app(NumberController::class)->fibonacci($request);
    } elseif ($operation === 'prima') {
        return app(NumberController::class)->prima($request);
    }
})->name('number.calculate');

// Fallback Route
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

// Test Fallback Route
Route::get('/fallback/test', function () {
    return response()->view('errors.404', [], 404);
})->name('fallback.test');

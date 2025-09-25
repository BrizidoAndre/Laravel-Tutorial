<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/login')->group(function () {
    Route::get('/', [\App\Http\Controllers\AuthController::class, 'form'])->name('login');
    Route::post('/store', [\App\Http\Controllers\AuthController::class, 'store'])->name('auth.store');
    Route::post('/', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
});

Route::resource('notes', \App\Http\Controllers\NotesController::class)
    ->middleware('auth')
    ->withoutMiddlewareFor(['index', 'show'], 'auth');

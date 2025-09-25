<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes/profile', [NotesController::class, 'profile'])->name('notes.profile');
Route::resource('notes', NotesController::class);

Route::prefix('/auth')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('auth.index')->withoutMiddleware('auth');
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/', [AuthController::class, 'store'])->name('auth.store');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/route_with_link')->name('route.link');
});

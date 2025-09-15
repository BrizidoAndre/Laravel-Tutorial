<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');

// this single line is equal to the crud above
//Route::resource('note', \App\Http\Controllers\NoteController::class);

Route::prefix('note')->group(function () {
    Route::get('/create', [\App\Http\Controllers\NoteController::class, 'create'])->name('note.create');
    Route::post('/', [\App\Http\Controllers\NoteController::class, 'store'])->name('note.store');
    Route::get('/', [\App\Http\Controllers\NoteController::class, 'index'])->name('note.index');
    Route::get('/{id}', [\App\Http\Controllers\NoteController::class, 'show'])->name('note.show');
    Route::get('/{id}/edit', [\App\Http\Controllers\NoteController::class, 'edit'])->name('note.edit');
    Route::put('/{id}', [\App\Http\Controllers\NoteController::class, 'update'])->name('note.update');
    Route::delete('/{id}', [\App\Http\Controllers\NoteController::class, 'destroy'])->name('note.destroy');
})->middleware('auth');

Route::prefix('/login')->group(function () {
    Route::get('/', [\App\Http\Controllers\LoginController::class, 'index'])->name('login.index');
    //Route::post('/', [\App\Http\Controllers\LoginController::class, 'store'])->name('login.store');
    Route::post('/', [\App\Http\Controllers\LoginController::class, 'log'])->name('login.log');
    Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'destroy'])->name('login.destroy');
});

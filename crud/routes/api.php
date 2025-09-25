<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('task')->group(function () {
    Route::post('create', [TaskController::class, 'create']);
    Route::get('all', [TaskController::class, 'get']);
    Route::get('view/{id}', [TaskController::class, 'view']);
});

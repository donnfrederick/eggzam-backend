<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tasks/{status}', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'save']);
Route::put('/tasks', [TaskController::class, 'update']);
Route::delete('/tasks', [TaskController::class, 'destroy']);
Route::put('/tasks/{id}/update-status/{status}', [TaskController::class, 'updateStatus']);
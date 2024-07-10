<?php
use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);
Route::post('tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
Route::patch('tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete.patch');

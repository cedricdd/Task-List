<?php

use App\Http\Controllers\TaskController;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', [TaskController::class, 'index'])->name("tasks.index");
Route::post('/tasks', [TaskController::class, 'store'])->name("tasks.store");
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name("tasks.show");
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name("tasks.update");
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name("tasks.edit");
Route::get('/tasks/create', [TaskController::class, 'create'])->name("tasks.create");

Route::fallback(function () {
    return redirect(route("tasks.index"), 301);
});
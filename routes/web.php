<?php

use App\Http\Controllers\TaskController;

use Illuminate\Support\Facades\Route;

Route::get('/tasks', [TaskController::class, 'index'])->name("tasks.index");
Route::post('/tasks', [TaskController::class, 'store'])->name("tasks.store");
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name("tasks.show")->where(["task"=> "[0-9]+"]);
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name("tasks.update")->where(["task"=> "[0-9]+"]);
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name("tasks.edit")->where(["task"=> "[0-9]+"]);
Route::get('/tasks/create', [TaskController::class, 'create'])->name("tasks.create");

Route::fallback(function () {
    return redirect(route("tasks.index"), 301);
});
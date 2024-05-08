<?php

use App\Http\Controllers\TaskController;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', [TaskController::class, 'index'])->name("tasks.index");
Route::post('/tasks', [TaskController::class, 'store'])->name("tasks.store");
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name("tasks.show")->where(['id' => '[0-9]+']);
Route::get('/tasks/create', [TaskController::class, 'create'])->name("tasks.create");

Route::fallback(function () {
    return redirect(route("tasks.index"), 301);
});
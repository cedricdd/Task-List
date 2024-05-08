<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', function () {
    return view('index', ['tasks' => Task::get(), "title" => "The list of tasks!"]);
})->name("tasks.index");

Route::get('/{id}', function ($id) {
    $task = Task::findOrFail($id);

    return view('show', ['task' => $task, "title" => $task->title]);
})->name("tasks.show")->where(['id' => '[0-9]+']);


Route::fallback(function () {
    return redirect("/tasks", 301);
});
<?php

namespace App\Http\Controllers;



use App\Models\Task;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TaskRequest;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function create(): View {
        return view('create', ["title" => "Create a New Task"]);
    }

    public function destroy(Task $task): RedirectResponse {
        $task->delete();

        return redirect()->route("tasks.index")->with("success","The task \"$task->title\" was successfully deleted!");
    }

    public function edit(Task $task): View {
        return view('edit', ['task' => $task, "title" => $task->title]);
    }

    public function index(): View {
        $tasks = Task::latest()->simplePaginate(10);
        $total = Task::count();
        
        return view("index", ["title" => "The list of tasks!", "tasks" => $tasks, "total" => $total]);
    }

    public function show(Task $task): View {
        return view('show', ['task' => $task, "title" => $task->title]);
    }

    public function store(TaskRequest $request): RedirectResponse {
        $task = Task::create($request->validated());

        return redirect()->route("tasks.show", $task->id)->with("success","The task \"$task->title\" was successfully added!");
    }

    public function toggle(Task $task): RedirectResponse {
        $task->completed ^= 1;
        $task->save();

        return redirect()->route("tasks.show", $task->id)->with("success","The task \"$task->title\" was successfully updated!");
    }

    public function update(TaskRequest $request, Task $task): RedirectResponse {
        $task->update($request->validated());

        return redirect()->route("tasks.show", $task->id)->with("success","The task \"$task->title\" was successfully edited!");
    }
}

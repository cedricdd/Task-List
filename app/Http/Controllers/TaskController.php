<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function create(): View {
        return view('create', ["title" => "Create a New Task"]);
    }

    public function edit(int $id): View {
        $task = Task::findOrFail($id);

        return view('edit', ['task' => $task, "title" => $task->title]);
    }

    public function index(): View {
        $tasks = Task::latest()->where("completed", false)->get();
        
        return view("index", ["title" => "The list of tasks!", "tasks" => $tasks]);
    }

    public function show(int $id): View {
        $task = Task::findOrFail($id);

        return view('show', ['task' => $task, "title" => $task->title]);
    }

    public function store(Request $request): RedirectResponse {
        $data = $request->validate([
            "title"=> "required|max:255",
            "description"=> "required",
            "long_description"=> "",
        ]);

        $task = new Task();
        $task->title = $data["title"];
        $task->description = $data["description"];
        $task->long_description = $data["long_description"];
        $task->save();

        return redirect()->route("tasks.show", $task->id)->with("success","The task \"$task->title\" was successfully added!");
    }

    public function update(Request $request, int $id): RedirectResponse {
        $data = $request->validate([
            "title"=> "required|max:255",
            "description"=> "required",
            "long_description"=> "",
        ]);

        $task = Task::findOrFail($id);
        $task->title = $data["title"];
        $task->description = $data["description"];
        $task->long_description = $data["long_description"];
        $task->save();

        return redirect()->route("tasks.show", $task->id)->with("success","The task \"$task->title\" was successfully edited!");
    }
}

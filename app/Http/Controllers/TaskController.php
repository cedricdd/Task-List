<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function create(): View {
        return view('create', ["title" => "Create a New Task"]);
    }

    public function index(): View {
        $tasks = Task::latest()->where("completed", false)->get();
        
        return view("index", ["title" => "The list of tasks!", "tasks" => $tasks]);
    }

    public function show(int $id): View {
        $task = Task::findOrFail($id);

        return view('show', ['task' => $task, "title" => $task->title]);
    }

    public function store(Request $request): View {
        dd($request->all());
    }
}

@extends("layouts.main")

@section("navigation")
    <span>{{ $task->title }}</span>
@endsection

@push("style")
    <style>
        .card {
            flex-direction: column;
        }

        .custom-form {
            display: inline-block;
        }

        .custom-button {
            min-width: 180px;
        }
    </style>
@endpush

@section("content")
    <div class="center">
        <a href="{{ route("tasks.edit", $task->id) }}" class="custom-button">✏️ Edit Task</a>
        <form class="custom-form" action="{{ route('tasks.toggle', $task->id) }}" method="POST">
            @csrf
            @method("PUT")
            <button type="submit" class="custom-button">🔄 {{ $task->completed ? "Mark As Unfinished" : "Mark As Completed" }}</button>
        </form>
        <form class="custom-form" action="{{ route('tasks.destroy', $task->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit" class="custom-button">❌ Delete Task</button>
        </form>
    </div>

    <div class="card">
        <p>{{ $task->description }}</p>
        @if(!empty($task->long_description)) 
            <p>{{ $task->long_description }}</p>
        @endif

        <p>{{ $task->created_at }}</p>
        <p>{{ $task->updated_at }}</p>
    </div>
@endsection
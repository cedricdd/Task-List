@extends("layouts.main")

@section("navigation")
    <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
    <span>Edit Task</span>
@endsection

@push("style")
    <style>
        .task-form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .task-form > .card {
            width: 96%;
            max-width: 500px;
            padding-bottom: 4px;
        }
        .task-form label, .task-form input, .task-form textarea {
            width: 100%;
            margin-top: 5px;
        }
        .task-form label {
            text-align: center;
            font-weight: 600;
        }
        .task-form textarea {
            resize: vertical;
        }

        .error-message {
            color: red;
        }

        .custom-button {
            min-width: 160px;
        }
    </style>
@endpush

@section("content")
    @include("form")
@endsection
@extends("layouts.main")

@section("navigation")
    <span>Create A New Task</span>
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
            min-width: 180px;
        }
    </style>
@endpush

@section("content")
    <form class="task-form" method="POST" action="{{ route("tasks.store") }}" accept-charset="UTF-8">
        @csrf
        <div class="card">
            <label for="title">Title: </label>
            <input type="text" name="title" id="name" placeholder="Enter Task Title" value="{{ old("title") }}" />
            @error("title") <p class="error-message">{{ $message }}</p> @enderror
        </div>
        <div class="card">
            <label for="description">Descrition: </label>
            <textarea name="description" id="description" placeholder="Enter Task Description">{{ old("description") }}</textarea>
            @error("description") <p class="error-message">{{ $message }}</p> @enderror
        </div>
        <div class="card">
            <label for="long_description">Long Descrition: </label>
            <textarea name="long_description" id="long_description" rows="10" placeholder="Enter Task Long Description">{{ old("long_description") }}</textarea>
            @error("long_description") <p class="error-message">{{ $message }}</p> @enderror
        </div>
        <div>
            <button class="custom-button" type="submit">☑️ Create Task</button>
            <a href="{{ route('tasks.index') }}" class="custom-button">❌Cancel</a>
        </div>
    </form>
@endsection
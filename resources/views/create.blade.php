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
        .task-form button {
            --b: 3px;   /* border thickness */
            --s: .10em; /* size of the corner */
            --c: white;
  
            padding: calc(.1em + var(--s)) calc(.3em + var(--s));
            color: var(--c);
            --_p: var(--s);
            background:
                conic-gradient(from 90deg at var(--b) var(--b),#0000 90deg,var(--c) 0)
                var(--_p) var(--_p)/calc(100% - var(--b) - 2*var(--_p)) calc(100% - var(--b) - 2*var(--_p));
            font-size: 2.5rem;
            cursor: pointer;
            border: none;
            margin: .2em;
        }
        .error-message {
            color: red;
        }
    </style>
@endpush

@section("content")
    <form class="task-form" method="POST" action="{{ route("tasks.store") }}" accept-charset="UTF-8">
        @csrf
        <div class="card">
            <label for="title">Title: </label>
            <input type="text" name="title" id="name" />
            @error("title") <p class="error-message">{{ $message }}</p> @enderror
        </div>
        <div class="card">
            <label for="description">Descrition: </label>
            <textarea name="description" id="description"></textarea>
            @error("description") <p class="error-message">{{ $message }}</p> @enderror
        </div>
        <div class="card">
            <label for="long_description">Long Descrition: </label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
            @error("long_description") <p class="error-message">{{ $message }}</p> @enderror
        </div>
        <div>
            <button type="submit">Create Task</button>
        </div>
    </form>
@endsection
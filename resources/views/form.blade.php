<form class="task-form" method="POST" action="{{ isset($task) ? route('tasks.update', $task->id) : route("tasks.store") }}" accept-charset="UTF-8">
    @csrf
    @isset($task) @method("PUT") @endisset
    <div class="card">
        <label for="title">Title: </label>
        <input type="text" name="title" id="name" placeholder="Enter Task Title" value="{{ old("title", $task->title) }}" />
        @error("title") <p class="error-message">{{ $message }}</p> @enderror
    </div>
    <div class="card">
        <label for="description">Descrition: </label>
        <textarea name="description" id="description" placeholder="Enter Task Description">{{ old("description", $task->description) }}</textarea>
        @error("description") <p class="error-message">{{ $message }}</p> @enderror
    </div>
    <div class="card">
        <label for="long_description">Long Descrition: </label>
        <textarea name="long_description" id="long_description" rows="10" placeholder="Enter Task Long Description">{{ old("long_description", $task->long_description) }}</textarea>
        @error("long_description") <p class="error-message">{{ $message }}</p> @enderror
    </div>
    <div>
        @if(isset($task))
        <button class="custom-button" type="submit">✏️ Edit Task</button>
        <a href="{{ route('tasks.show', $task->id) }}" class="custom-button">❌Cancel</a>
        @else
        <button class="custom-button" type="submit">☑️ Create Task</button>
        <a href="{{ route('tasks.index') }}" class="custom-button">❌Cancel</a>
        @endif
    </div>
</form>
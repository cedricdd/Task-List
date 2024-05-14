@extends("layouts.main")

@push("style")
    <style>
        .card:nth-child(2n) {
            background-color: rgb(63, 63, 63);
        }
        .card:hover {
            background-color: #575757;
        }
        .container {
            padding-bottom: 50px;
        }
        .completed {
            text-decoration: line-through;
        }
    </style>
@endpush

@section("content")

<div class="container">
    <div class="center">
        <a href="{{ route("tasks.create") }}" class="custom-button">➕ Add New Task</a>
    </div>

    @forelse ($tasks as $task)
    <div @class(["card", "completed" => $task->completed])>
        <a href="{{ route("tasks.show", $task->id) }}">🔗 {{ $task->title }} -- {{ (($tasks->currentPage() - 1) * 10 + $loop->iteration) . "/" . $total }}</a>
    </div>
    @empty
        <div class="card">😞 There are currently no tasks!</div>
    @endforelse

    @if($tasks->count())
    <div class="center">{{ $tasks->links() }}</div>
    @endif
</div>

@endsection
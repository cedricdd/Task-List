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
    </style>
@endpush

@section("content")

<div class="container">
    @forelse ($tasks as $task)
    <div class="card">
        <a href="{{ route("tasks.show", ["id" => $task->id]) }}">🔗 {{ $task->title }} -- {{ $loop->iteration . "/" . $loop->count }}</a>
    </div>
    @empty
        <div class="card">😞 There are currently no tasks!</div>
    @endforelse
</div>

@endsection
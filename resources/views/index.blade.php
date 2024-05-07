@extends("layouts.main")

@section("style")
    <style>
    </style>
@endsection

@section("content")

@forelse ($tasks as $task)
    <div class="{{ $loop->even ? "card" : "card2" }}">
        <a href="{{ route("tasks.show", ["id" => $task->id]) }}">🔗 {{ $task->title }} -- {{ $loop->iteration . "/" . $loop->count }}</a>
    </div>
@empty
    <div class="card">😞 There are currently no tasks!</div>
@endforelse

@endsection
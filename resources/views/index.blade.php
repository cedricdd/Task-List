@extends("layouts.main")

@section("style")
    <style>
    </style>
@endsection

@section("content")

@forelse ($tasks as $task)
    <div class='card'>
        <a href="{{ route("tasks.show", ["id" => $task->id]) }}">🔗 {{ $task->title }}</a>
    </div>
@empty
    <div class="card">😞 There are currently no tasks!</div>
@endforelse

@endsection
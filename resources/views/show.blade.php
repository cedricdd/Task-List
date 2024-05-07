@extends("layouts.main")

@section("navigation")
    <span>{{ $task->title }}</span>
@endsection

@push("style")
    <style>
        .card {
            flex-direction: column;
        }
    </style>
@endpush

@section("content")
    <div class="card">
        <p>{{ $task->description }}</p>
        @if(!empty($task->long_description)) 
            <p>{{ $task->long_description }}</p>
        @endif

        <p>{{ $task->created_at }}</p>
        <p>{{ $task->updated_at }}</p>
    </div>
@endsection
@extends("layouts.main")

@section("navigation")
    <span>Create A New Task</span>
@endsection


@section("content")
    <form method="POST" action="{{ route("tasks.store") }}" accept-charset="UTF-8">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="name" />
        </div>
        <div>
            <label for="descrition">Descrition</label>
            <textarea name="descrition" id="descrition" cols="30" rows="5"></textarea>
        </div>
        <div>
            <label for="long_descrition">Long Descrition</label>
            <textarea name="long_descrition" id="long_descrition" cols="30" rows="10"></textarea>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection
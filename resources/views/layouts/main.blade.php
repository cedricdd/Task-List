<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @isset($title) <title>Task List -- {{ $title }}</title>
    @else <title>Task List</title>
    @endisset

    <style>
        html, body {
            background-color: #121212;
            color: rgb(255, 255, 255);
            font-family: "Plus_Jakarta_Sans", "Roboto", "Segoe UI", sans-serif;
            box-sizing: border-box;
        }
        .navigation {
            margin: 15px -10px;
        }
        .navigation > * {
            padding: 10px 5px;
        }
        .navigation > span::before, .navigation > a::before {
            content: "> ";
        }
        .navigation > a:hover {
            background-color: rgb(40, 40, 40);
            border-radius: 0 10px 10px 0;
        }
        a {
            color: white;
            text-decoration: none;
        }
        .title {
            margin-top: 20px;
            font-size: 50px;
            text-align: center;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 25px;
            overflow-wrap: break-word;
        }
        .card {
            background-color: rgb(40, 40, 40);
            border-radius: 10px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 10px 0px;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 8px auto;
        }
    </style>

    @stack("style")
</head>
<body>
    <div class="navigation">
        <a href="{{ route("tasks.index") }}">Task List</a>
        @yield('navigation')
    </div>

    @isset($title) <div class="title">{{ $title }}</div> @endisset

    @yield('content')
</body>
</html>
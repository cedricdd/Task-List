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

        .center {
            text-align: center;
        }

        .navigation {
            margin: 15px -8px;
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
            flex-direction: column;
            margin: 8px auto;
        }
        .card-success {
            background-color: green !important;
            text-align: center;
            font-weight: bold;
        }

        .custom-button {
            --c:  #292b2f; /* the color*/
        
            color: white;
            padding: 10px 20px;
            margin: 10px;
            display: inline-block;
            font-size: 20px;
            box-shadow: 0 0 0 .15em inset var(--c); 
            --_g: linear-gradient(var(--c) 0 0) no-repeat;
            background: 
                var(--_g) calc(var(--_p,0%) - 100%) 0%,
                var(--_g) calc(200% - var(--_p,0%)) 0%,
                var(--_g) calc(var(--_p,0%) - 100%) 100%,
                var(--_g) calc(200% - var(--_p,0%)) 100%;
            background-size: 50.5% calc(var(--_p,0%)/2 + .5%);
            outline-offset: .1em;
            transition: background-size .25s, background-position 0s .25s;
            border: none;
            border-radius: 6px;
            text-align: center;
            box-sizing: border-box;
        }
        .custom-button:hover {
            --_p: 100%;
            transition: background-position .5s, background-size 0s;
        }
        .custom-button:active {
            box-shadow: 0 0 9e9q inset #0009; 
            background-color: var(--c);
        }
    </style>

    @stack("style")
</head>
<body>
    <div class="navigation">
        <a href="{{ route("tasks.index") }}">Task List</a>
        @yield('navigation')
    </div>

    @session('success')
    <div class="card card-success">
        ✅ {{ $value }}
    </div>
    @endsession

    @isset($title) <div class="title">{{ $title }}</div> @endisset

    @yield('content')
</body>
</html>
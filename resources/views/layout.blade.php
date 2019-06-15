<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Laravel Test')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            * {
                font-family: 'Nunito', sans-serif;
                font-size: 20px;
            }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                font-size: 20px;
                height: 100vh;
                margin: 0;
            }
            a, a:active, a:focus, a:visited {
                font-weight: 600;
                text-decoration: none;
                color: #56927c;
            }
            a:hover {
                color: #67A38D;
            }

            ul {
                list-style: inside;
            }
            li {
                margin-bottom: 1em;
            }
            h1 {
                font-size: 30px;
            }
            textarea, input[type=text] {
                width: 100%;
                margin-bottom: 30px;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: top;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin-bottom: 30px;
            }

            .title {
                font-size: 72px;
                margin-top: 30px;
            }
            .links {
                margin-bottom: 50px;
            }

            .links > a {
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .projects-list {
                margin-bottom: 30px;
                padding: 20px;
                background-color: #f0f7f5;
                border-radius: 10px;
                border: 2px solid #ddede7;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .is-complete {
                text-decoration: line-through;
            }
            .new-task {
                margin-bottom: 30px;
                font-size: 25px;
                font-weight: 600;
            }
        </style>


    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel 5.7 - Learning
                </div>
                
                <div class="links">
                    <a href="/">{{ $welcome }}</a>
                    <a href="/projects">{{ $pro }}</a>
                    <a href="/projects/create">{{ $create }}</a>
                    <a href="/contact">{{ $contact }}</a>
                    <a href="/about">{{ $about }}</a>
                </div>

                @yield('content')

            </div>
        </div>
    </body>
</html>

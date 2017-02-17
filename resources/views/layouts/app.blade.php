<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"
            integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK"
            crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="https://use.fontawesome.com/f60fcc0399.js"></script>
</head>
<body>


<nav class="navbar navbar-light bg-faded">
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar-header"
            aria-controls="navbar-header" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-toggleable-xs" id="navbar-header">
        <a class="navbar-brand" href="{{url('/home')}}">Nested</a>
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
            </li>

            {{--IF LOGGGED IN--}}

            @if(!\Illuminate\Support\Facades\Auth::guest())

                @if(Auth::user()->isAdmin())

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('cp')}}">Control panel</a>
                    </li>
                @endif

                @if(Auth::user()->isMod() || Auth::user()->isAdmin())

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('new')}}">New</a>
                    </li>

                @endif

            @endif



        </ul>
        <ul class="nav navbar-nav float-xs-right">

            {{--IF LOGGGED IN--}}

            @if(!\Illuminate\Support\Facades\Auth::guest())

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('profile')}}">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('logout')}}">Logout</a>
                    </li>

            @else

                <li class="nav-item">
                    <a class="nav-link" href="{{url('login')}}">Login</a>
                </li>
            @endif

        </ul>
    </div>
</nav>


@yield('content')


<br>
<br>
<br>


<script src="/js/app.js"></script>
</body>
</html>

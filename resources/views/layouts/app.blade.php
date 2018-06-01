<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"
    />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color:lightseagreen; color:black;">
            <div class="container">
                <a class="navbar-brand" style="color:white;" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li>
                            <a class="nav-link" href="{{ route('login') }}" style="color:white;">
                                    <i class="fa fa-user"></i> {{ __('Login') }}
                                </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('register') }}" style="color:white;">
                                    <i class="fas fa-sign-in-alt"></i> {{ __('Register') }}
                                </a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre style="color:white;">
                                <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('profile') }}">
                                        <i class="fa fa-user"></i>
                                         My profile
                                    </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                                    </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <nav class="nav sub-menu">
            <div class="container">
                <div class="row">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                    <a class="nav-link" href="{{ route('about') }}">About</a> 
                    @if (!Auth::check())
                    <a class="nav-link" href="#">Login</a> 
                    @endif
                    <a class="nav-link" href="{{ route('equipment.index') }}">Products</a>
                    <a class="nav-link" href="{{ route('companies')}}">Companies</a>
                    @if (Auth::check())
                    @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Management'))
                    <a class="nav-link" href="{{ route('chart') }}">Statistics</a>
                    @endif
                    @endif
                    @if (Auth::check())
                    @if(Auth::user()->hasRole('Admin'))
                    <a class="nav-link" href="{{ route('users.index') }}">Manage Users</a>
                    @endif
                    @if(Auth::user()->hasRole('Management'))
                    <a class="nav-link" href="{{ route('testrequests.index') }}">Test Requests</a>
                    @endif
                    @endif
                </div>
            </div>
        </nav>
        <br> @if(Session::has('flash_message'))
        <div class="container">
            <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
            </div>
        </div>
        @endif

        <main class="py-4">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
    @include ('errors.list') {{-- Including error file --}}
                </div>
            </div>

            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function () {
            $(".datepicker-future").datepicker();
        });
    </script>
</body>
</html>

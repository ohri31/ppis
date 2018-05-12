<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fas fa-user"></i> {{ __('Login') }}
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('register') }}">
                                    <i class="fas fa-sign-in-alt"></i> {{ __('Register') }}
                                </a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
                    <a class="nav-link" href="#">About</a>
                    @if (!Auth::check())
                    <a class="nav-link" href="#">Login</a>
                    @endif
                    <a class="nav-link" href="{{ route('equipment.index') }}">Products</a>
                    <a class="nav-link" href="#">Clients</a>
                    <a class="nav-link" href="#">FAQ</a>
                     @role('Admin')
                    <a class="nav-link" href="{{ route('users.index') }}">Manage Users</a>
                    @endrole

                    <a class="nav-link" href="{{ route('testrequests.index') }}">Test Requests</a>

                </div>
            </div>
        </nav>
<br>
        @if(Session::has('flash_message'))
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
</body>
</html>

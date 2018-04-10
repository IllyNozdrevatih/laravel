<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hospital</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
       footer {
           background-color: #5e5d5d;
       }

       body {
           height: 100%;
           display: flex;
           flex-direction: column;
           height: 100%;
       }
       html {
           height: 100%
       }
       #app {
           flex-grow:1;
       }

       .float {
           float: left;
       }

       .height {
           height: 45px;
       }

       .img{
           width: 40px;
           height: 30px;
       }

       .profile-img {
           width:120px;
           height:120px;
           margin: 5px;
       }
       .text-align {
           text-align: center;
       }

       .info-block {
           width: 338px;
           background-color: #262626;
           border: 2px solid  #262626;
           border-radius: 5px;
           float: left;
           margin: 10px;
           overflow: hidden;
           text-overflow: ellipsis;
           color: #cccccc;
       }
    </style>
</head>
<body>
    <div id="app">
        <header>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Hospital
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (Auth::check())
                        <li><a href="{{url('/cabinet')}}">Кабинет</a></li>
                            @if(Auth::user()->role == 'doctor' || Auth::user()->role == 'admin')
                        <li><a href="{{url('/form_massage')}}">Письмо разработчику</a></li>
                            @elseif(Auth::user()->role == 'client')
                                <li><a href="{{url('/allDoctors')}}">Доктора</a></li>
                                <li><a href="{{url('/statement_form/null')}}">Заключить договор</a></li>
                            @endif    &nbsp;
                        @endif    &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Вход</a></li>
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           Выйти
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        </header>
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

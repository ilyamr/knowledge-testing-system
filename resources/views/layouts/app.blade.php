<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@if(isset($title)){{$title}}@else @yield('title') @endif</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    <!-- Styles -->
     <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'PT Sans', sans-serif;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>

    @yield('head')
</head>
<body id="app-layout">

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Study
            </a>
        </div>

        <div class="collapse navbar-collapse" id="spark-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::user()->role == 'admin')
                                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-btn fa-cog" aria-hidden="true"></i>Dashboard</a></li>
                            @endif
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
{{--<header>--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-6">--}}
                {{--<div class="logo"><a href="{{url('/')}}">Study</a></div>--}}
            {{--</div>--}}
            {{--<div class="col-md-6 text-right">--}}
                {{--<a href="{{'/login'}}">Авторизуватися</a> |--}}
                {{--<a href="{{'/register'}}">Зареєструватися</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</header>--}}

<div class="container">
    <div class="row">
        <div class="menu col-md-2">
            <ul>
                <li>
                    Сryptographic algorithms
                    <ul>
                        <li><a href="/rsa">RSA</a></li>
                        <li><a href="/caesar">Caesar</a></li>
                        <li><a href="/aes">AES</a></li>
                        {{--<li>@ <a href="/elliptic">Elliptic</a></li>--}}
                    </ul>
                </li>
                <li>
                    Hash functions
                    <ul>
                        <li><a href="/md5">MD5</a></li>
                        {{--<li><a href="/4">DES</a></li>--}}
                        <li><a href="/sha1">SHA1</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="content col-md-10">
            @yield('content')
        </div>
    </div>
</div>

    <!-- JavaScripts -->
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>

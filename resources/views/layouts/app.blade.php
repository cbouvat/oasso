<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/ico" href="{{asset('img/favicon.ico')}}"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

</head>
<body>

<!-- Include message Alert -->
@include('layouts.message');


<nav class="navbar navbar-light fixed-top bg-secondary flex-md-nowrap p-0 shadow">
    <a class="navbar-brand bg-secondary col-sm-3 col-md-2 mr-0" id="app-link-name"
       href="{{route('home')}}">{{config('app.name')}} - {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>

    <form class="w-100" action={{route('search')}} method="get">
        <input class="form-control form-control-light w-100" id="search-bar" type="search" placeholder="Search"
               aria-label="Search" name="q">
    </form>

    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            @auth
                <a class="nav-link" id="logout-form" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 d-none d-md-block bg-light sidebar">
            @include('layouts.menu');
        </div>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('content')
        </main>
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- For add script for ur page, look Laravel Documentation Stacks (push method) -->
@stack('scripts')

</body>
</html>


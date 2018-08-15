<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="icon" type="image/ico" href="{{asset('img/favicon.ico')}}"/>
</head>
<body>

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    @auth
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('home') }}">{{config('app.name')}}</a>
        @if(Auth::user()->role()->first()->role_type_id != 1)
            <form class="w-100" action={{ route('admin.search') }} method="get">
                <input class="form-control form-control-dark" id="search-bar" type="search" placeholder="Rechercher"
                       aria-label="Search" name="q">
            </form>
        @endif
        <div class="navbar-nav px-3">
            <form action="{{ route('logout') }}" method="post" class="form-inline">
                @csrf
                <button type="submit" class="btn btn-link nav-link"><span data-feather="log-out"></span> Déconnexion</button>
            </form>
        </div>
    @endauth
    @guest
        <a class="navbar-brand col-12 mr-0" href="{{ route('home') }}">{{config('app.name')}}</a>
    @endguest
</nav>

<div class="container-fluid">
    @auth

        <div class="row">
            <div class="col-md-2 d-none d-md-block bg-light sidebar">
                @include('shared.sidebar')
            </div>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <!-- Include message Alert -->
                @include('shared.alert')
                <!-- Main content -->
                @yield('content')
            </main>
        </div>
    @endauth

    @guest
        <main role="main" class="px-4">
            <!-- Include message Alert -->
            @include('shared.alert')
            <!-- Main content -->
            @yield('content')
        </main>
    @endguest
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')

</body>
</html>

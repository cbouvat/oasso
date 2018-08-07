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
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">{{config('app.name')}} </a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            @auth
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
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
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">

                <!--USER SIDE NAV -->
                <ul class="nav flex-column">
                    <li class="nav-item">

                            <span data-feather="home">@ if User->role == User</span>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file">
                                <i class="fas fa-home"></i>
                            </span>
                            Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart">
                                <i class="fas fa-users"></i>
                            </span>
                            Mon compte
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users">
                                <i class="fas fa-lock"></i>
                            </span>
                            Mot de passe
                        </a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link" href="{{route('front.user.gift')}}">
                            <span data-feather="bar-chart-2">
                                <i class="fas fa-gift"></i>
                            </span>
                            Dons
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers">
                                <i class="fas fa-signal"></i>
                            </span>
                            Historique
                        </a>
                    </li>
                </ul>

                    <!--ADMIN //COMMERCIAL SIDE NAV -->
                <ul class="nav flex-column">
                    <li class="nav-item">

                            <span data-feather="home">@ if user->role == Admin or Commercial</span>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file">
                                <i class="fas fa-home"></i>
                            </span>
                            Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart">
                                <i class="fas fa-users"></i>
                            </span>
                            Gestion Adherents
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users">
                                <i class="fas fa-file-export"></i>
                            </span>
                            Export
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2">
                                <i class="fas fa-envelope"></i>
                            </span>
                            Mailing
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers">
                                <i class="far fa-newspaper"></i>
                            </span>
                            NewsLetter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers">
                                <i class="fas fa-gift"></i>
                            </span>
                            Gestion des Dons
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers">
                                <i class="fas fa-signal"></i>
                            </span>
                            Statistiques
                        </a>
                    </li>
                    <!-- SUPPLEMENT ADMIN KETCHUP TOMATE OIGNONS-->
                    <li class="nav-item">

                            <span data-feather="home">@ if user->role == Admin</span>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2">
                                <i class="fas fa-users"></i>
                            </span>
                            Gestion des Utilisateurs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers">
                                <i class="fas fa-cogs"></i>
                            </span>
                            Configuration
                        </a>
                    </li>
                </ul>


                {{--<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">--}}
                    {{--<span>Saved reports</span>--}}
                    {{--<a class="d-flex align-items-center text-muted" href="#">--}}
                        {{--<span data-feather="plus-circle"></span>--}}
                    {{--</a>--}}
                {{--</h6>--}}
                {{--<ul class="nav flex-column mb-2">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="file-text"></span>--}}
                            {{--Title 1--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="file-text"></span>--}}
                            {{--Title 2--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="file-text"></span>--}}
                            {{--Title 3--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="file-text"></span>--}}
                            {{--Title 4--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            </div>
        </nav>

        <div class="container mt-5 pt-5">
            @yield('content')
        </div>

    </div>
</div>


</body>
</html>

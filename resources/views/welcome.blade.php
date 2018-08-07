<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="container">
    <div class="text-center m-5 p-5">
        <h1 class="display-1">{{config('app.name')}}</h1>
    </div>
    <div class="text-center">
        @if (Route::has('login'))
            <div class="top-right links">
            @auth
                <a class="btn btn-outline-primary" href="{{ url('/home') }}">Acceder a l'Application</a>
            @else
                <a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
                <a class="btn btn-outline-primary" href="{{ route('register') }}">S'inscrire</a>
            @endauth
            </div>
    @endif

</div>
</body>
</html>

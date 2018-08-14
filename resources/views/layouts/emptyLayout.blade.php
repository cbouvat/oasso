<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="container">
<div class="text-center m-5 p-5">
    <h1 class="display-1">{{ config('app.name') }}</h1>
</div>
<div class="text-center">
@yield('content')
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>

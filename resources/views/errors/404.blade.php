@extends('layouts.app')

@section('content')
    <img src="https://http.cat/404" style="max-width: 400px" class="img-fluid rounded mx-auto d-block" alt="">
    <div class="text-center p-3">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">Accueil</a>
    </div>
@endsection

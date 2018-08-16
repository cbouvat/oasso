@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Suppression de {{ $user->firstname }} {{ $user->lastname }}</h1>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Membres</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user.show', $user) }}">Membre {{ $user->id }}</a></li>
            <li class="breadcrumb-item">Suppression de Membre {{ $user->id }}</li>
        </ol>
    </nav>
    <h2 class="mt-5 pt-5 text-center">Souhaitez-vous supprimer ce membre ?</h2>

    <div class="text-center mt-4 pt-4">
        <a type="button" class="btn btn-danger btn-lg mr-2"
           href="{{route('admin.user.softdelete', ['user' => $user])}}">Oui</a>
        <a type="button" class="btn btn-secondary btn-lg ml-2" href="{{ route('admin.user.show', $user) }}">Non</a>
    </div>
@endsection
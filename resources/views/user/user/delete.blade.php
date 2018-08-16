@extends('layouts.app')

@section('content')
    <h1 class="mt-5 pt-5 text-center">Souhaitez-vous supprimer ce compte ?</h1>
    <div class="text-center mt-4 pt-4">
        <a class="btn btn-danger btn-lg"
           href="{{route('user.delete')}}">Oui</a>
        <a class="btn btn-secondary btn-lg" href="{{route('user.index', ['user' => $user])}}">Non</a>
    </div>
@endsection
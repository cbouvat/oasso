@extends('layouts.app')

@section('content')
    <h1 class="mt-5 pt-5 text-center">Souhaitez-vous supprimer ce membre ?</h1>
    <div class="text-center mt-4 pt-4">
        <a type="button" class="btn btn-danger btn-lg mr-2"
           href="{{route('admin.user.softdelete', ['user' => $user])}}">Oui</a>
        <a type="button" class="btn btn-secondary btn-lg ml-2" href="{{route('admin.user.index', ['user' => $user])}}">Non</a>
    </div>
@endsection
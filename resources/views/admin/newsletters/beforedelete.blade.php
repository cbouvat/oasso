@extends('layouts.app')

@section('content')
    <h1 class="mt-5 pt-5 text-center">Souhaitez-vous supprimer cette newsletter ?</h1>
    <div class="text-center mt-4 pt-4">
        <a type="button" class="btn btn-danger btn-lg mr-2"
           href="{{route('admin.newsletters.delete', ['id' => $id])}}">Oui</a>
        <a type="button" class="btn btn-secondary btn-lg ml-2" href="{{route('admin.newsletters.index')}}">Non</a>
    </div>
@endsection
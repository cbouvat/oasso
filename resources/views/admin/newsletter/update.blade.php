@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>{{__('Update Newsletter')}}</h1>
    </div>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.newsletter.index') }}">Newletter</a></li>
                <li class="breadcrumb-item">{{__('Update newsletter')}}</li>
            </ol>
        </nav>
    </div>
    <form method="post" action="{{ route('admin.newsletter.update', ['newsletter'=> $newsletter]) }}">
        @csrf

        @include('admin.newsletter.wysiwyg')

        <div class="row justify-content-around">
            <input type="submit" class="btn btn-primary mt-2" value="Enregistrer">
            <a class="btn btn-danger mt-2" href="{{route('admin.newsletter.index')}}">Annuler</a>
        </div>
    </form>
@endsection
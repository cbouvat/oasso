@extends('layouts.app')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.newsletter.index') }}">Newletter</a></li>
                <li class="breadcrumb-item">Duplication newsletter</li>
            </ol>
        </nav>
    </div>
    <form method="post" action="{{ route('admin.newsletter.store') }}">
        @csrf
        <h1>{{__('Newsletter page title')}}</h1>
        <h2>{{__('Update newsletter')  }}</h2>

        @include('admin.newsletter.wysiwyg')

        <div class="row justify-content-around">
            <input type="submit" class="btn btn-primary" value="Enregistrer">
            <a class="btn btn-danger" href="{{route('admin.newsletter.index')}}">Annuler</a>
        </div>
    </form>
@endsection
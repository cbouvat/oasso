@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>{{ __('app.Update newsletter') }}</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('app.Home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.newsletter.index') }}">{{ __('app.Newsletter') }}</a></li>
            <li class="breadcrumb-item">{{ __('app.Update newsletter') }}</li>
        </ol>
    </nav>
    <form method="post" action="{{ route('admin.newsletter.update', ['newsletter'=> $newsletter]) }}">
        @csrf

        @include('admin.newsletter.wysiwyg')

        <div class="row justify-content-around">
            <input type="submit" class="btn btn-primary" value="Enregistrer">
            <a class="btn btn-danger" href="{{route('admin.newsletter.index')}}">Annuler</a>
        </div>
    </form>
@endsection
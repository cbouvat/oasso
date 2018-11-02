@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>{{ __('app.Remove this account ?') }}</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item">{{ __('app.Remove this account ?') }}</li>
        </ol>
    </nav>

    <p>
        Souhaitez-vous supprimer votre compte ?<br>
        Cette action est irrémediable.
    </p>
    <form action="{{ route('user.destroy') }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="{{ __('app.Yes') }}">
        <a class="btn btn-outline-secondary" href="{{ route('user.index') }}">{{ __('app.No') }}</a>
    </form>

@endsection

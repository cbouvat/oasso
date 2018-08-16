@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>{{__('Create newsletter')  }}</h1>
    </div>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.newsletter.index') }}">Newsletter</a></li>
                <li class="breadcrumb-item">Duplication newsletter</li>
            </ol>
        </nav>
    </div>
    <form method="post" action="{{ route('admin.newsletter.store') }}">
        @csrf

        @include('admin.newsletter.wysiwyg')

        <div class="row justify-content-around">
            <input type="submit" class="btn btn-sm btn-primary mt-2" value="Enregistrer">
            <a type="button-primary" class="btn btn-sm btn-danger mt-2" href="{{route('admin.newsletter.index')}}"><span
                        data-feather="x"></span> {{__('Cancel')  }}</a>
        </div>
    </form>
@endsection
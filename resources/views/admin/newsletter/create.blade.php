@extends('layouts.app')

@section('content')

    <form method="post" action="{{ route('admin.newsletter.store') }}">
        @csrf
        <h1>{{__('Newsletter page title')}}</h1>
        <h2>{{__('Create newsletter')  }}</h2>

        @include('admin.newsletter.wysiwyg')

        <div class="row justify-content-around">
            <input type="submit" class="btn-sm btn-primary m-2" value="Enregistrer">
            <a class="btn-sm btn-danger m-2" href="{{route('admin.newsletter.index')}}">Annuler</a>
        </div>
    </form>
@endsection
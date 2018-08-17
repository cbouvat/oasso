@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>{{ __('app.New newsletter') }}</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('app.Home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.newsletter.index') }}">{{ __('app.Newsletter') }}</a></li>
            <li class="breadcrumb-item">{{ __('app.New newsletter') }}</li>
        </ol>
    </nav>

    <form method="post" action="{{ route('admin.newsletter.store') }}">
        @csrf
        <div class="row justify-content-center">
            <div class=" col-md-12 ">

                @include('admin.newsletter.wysiwyg')

                <div class="row justify-content-around">
                    <input type="submit" class="btn-sm btn-primary m-2" value="{{ __('app.Save') }}">
                    <a class="btn-sm btn-danger m-2" href="{{route('admin.newsletter.index')}}">{{ __('app.Cancel') }}</a>
                </div>
            </div>
        </div>
    </form>
@endsection
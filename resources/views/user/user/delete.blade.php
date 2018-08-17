@extends('layouts.app')

@section('content')
    <h1 class="mt-5 pt-5 text-center">{{ __('app.Remove this account ?') }}</h1>
    <div class="text-center mt-4 pt-4">
        <a class="btn btn-danger btn-lg"
           href="{{route('user.delete')}}">{{ __('app.Yes') }}</a>
        <a class="btn btn-secondary btn-lg" href="{{route('user.index', ['user' => $user])}}">{{ __('app.No') }}</a>
    </div>
@endsection
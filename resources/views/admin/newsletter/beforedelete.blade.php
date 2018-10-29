@extends('layouts.app')

@section('content')
    <h2 class="mt-5 pt-5 text-center">{{ __('app.Remove this newsletter?') }}</h2>
    <div class="text-center mt-4 pt-4">
        <a type="button" class="btn btn-danger btn-lg mr-2"
           href="{{route('admin.newsletter.delete', ['id' => $id])}}">{{ __('app.Yes') }}</a>
        <a type="button" class="btn btn-secondary btn-lg ml-2" href="{{route('admin.newsletter.index')}}">{{ __('app.No') }}</a>
    </div>
@endsection
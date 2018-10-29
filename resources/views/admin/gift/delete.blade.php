@extends('layouts.app')

@section('content')
    <h1 class="mt-5 pt-5 text-center">{{ __('app.Remove this gift ?') }}</h1>
    <div class="text-center mt-4 pt-4">
        <form action="{{ route('admin.gift.destroy', $gift) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger btn-lg mr-2">{{ __('app.Yes') }}</button>
            <a class="btn btn-secondary btn-lg ml-2" href="{{route('admin.gift.index')}}">{{ __('app.No') }}</a>
        </form>
    </div>
@endsection
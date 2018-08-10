@extends('layouts.app')

@section('content')

    <form method="post" action="{{ route('admin.newsletters.update', ['newsletter'=> $newsletter]) }}">
        @csrf
        <div class="row justify-content-center mt-5">
            <div class=" col-md-12 ">
                <div>
                    <h1>{{__('Newsletter page title')}}</h1>
                    <h2>{{__('Update newsletter')  }}</h2>
                </div>

                @include('admin.newsletters.wysiwyg')

                <input type="submit" class="btn btn-primary m-2" value="Enregistrer">

            </div>
        </div>
    </form>
@endsection
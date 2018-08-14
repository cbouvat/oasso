@extends('layouts.app')

@section('content')

    <form method="get" action="{{ route('admin.newsletter.show', ['newsletter'=> $newsletter]) }}">
        @csrf
        <h1>{{__('Newsletter page title')}}</h1>
        <h2>{{__('send newsletter')  }}</h2>

        <div class="card bg-light mb-3" style="max-width: 1200px;">
            <div class="card-header">
                {{__('Title : ')  }} {{ $newsletter->title }}
            </div>
            <div class="card-body">
                {!! $newsletter->html_content !!}
            </div>
            <div class="card-footer bg-light">
                <div class="row justify-content-around ">
                    <a class="btn btn-primary"
                       href="{{route('admin.newsletter.edit', ['newsletter' => $newsletter])}}">{{__('Update')  }}</a>
                    <a class="btn btn-success" href="{{route('admin.newsletter.send', ['newsletter' => $newsletter])}}">Ship</a>
                    <a class="btn btn-danger" href="{{route('admin.newsletter.index')}}">Annuler</a>
                </div>
            </div>
        </div>
    </form>
@endsection
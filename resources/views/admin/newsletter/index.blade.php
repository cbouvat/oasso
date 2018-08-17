@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>{{__('Newsletter')}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{route('admin.newsletter.create')}}" class="btn btn-success">{{ __('app.New newsletter') }}</a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('app.Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('app.Newsletter') }}</li>
        </ol>
    </nav>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>{{ __('app.Date') }}</th>
            <th>{{ __('app.Title') }}</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($newsletters as $newsletter)
            <tr>
                <th scope="row">{{ $newsletter->created_at }}</th>
                <td>{{ $newsletter->title }}</td>
                <td class="text-right">
                    <a type="button-primary" class="btn btn-sm btn-outline-primary"
                       href="{{route('admin.newsletter.edit', ['newsletter' => $newsletter])}}"><span
                                data-feather="edit"></span> {{ __('app.Update') }}</a>
                    <a type="button-primary" class="btn btn-sm btn-sm btn-outline-danger"
                       href="{{route('admin.newsletter.beforedelete', ['newsletter' => $newsletter])}}"><span
                                data-feather="trash"></span> {{ __('app.Remove') }}</a>
                    <a type="button-primary" class="btn btn-sm btn-outline-secondary btn-sm"
                       href="{{route('admin.newsletter.duplicate', ['newsletter' => $newsletter])}}"><span
                                data-feather="copy"></span> {{ __('app.Duplicate') }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$newsletters->links()}}
@endsection

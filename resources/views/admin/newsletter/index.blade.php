@extends('layouts.app')
@section('content')

    <div class="row justify-content-center">

        <div class="col-lg-10">
            <h1>{{__('Newsletter page title')}}</h1>
        </div>
        <div class="col-lg-2 mt-4">
            <a href="{{route('admin.newsletter.create')}}" class="btn btn-success mb-1">New newsletter</a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Date</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($newsletters as $newsletter)
            <tr>
                <th scope="col">{{$newsletter->created_at}}</th>
                <td scope="col">{{$newsletter->title}}</td>
                <td scope="col">
                    <a type="button-primary" class="btn btn-primary btn-sm"
                       href="{{route('admin.newsletter.edit', ['newsletter' => $newsletter])}}">Modifier</a>
                    <a type="button-primary" class="btn btn-danger ml-2 mr-2 btn-sm"
                       href="{{route('admin.newsletter.beforedelete', ['newsletter' => $newsletter])}}">Supprimer</a>
                    <a type="button-primary" class="btn btn-info btn-sm"
                       href="{{route('admin.newsletter.duplicate', ['newsletter' => $newsletter])}}">Dupliquer</a>
                    <a type="button-primary" class="btn btn-info btn-sm ml-2 mr-2"
                       href="{{route('admin.newsletter.show', ['newsletter' => $newsletter])}}">Display</a>
                    <button type="button" class="btn btn-info btn-sm ml-2 mr-2"
                       href="{{route('admin.newsletter.show', ['newsletter' => $newsletter])}}">
                        {{ $newsletter->status }} <span class="badge badge-light">{{'toto counter'}}</span>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav class="pagination justify-content-center">{{$newsletters->links()}}</nav>
@endsection

@extends('layouts.app')
@section('content')

    <div class="row justify-content-center mt-5">

        <div class="col-lg-10 mt-4">
            <h1>{{__('Newsletter page title')}}</h1>
        </div>
        <div class="col-lg-2 mt-5">
            <a href="{{route('admin.newsletters.create')}}" class="btn btn-success">New newsletter</a>
        </div>
    </div>
    <table class="table table-striped mt-4">
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
                       href="{{route('admin.newsletters.update', ['id' => $newsletter->id])}}">Modifier</a>
                    <a type="button-primary" class="btn btn-danger ml-2 mr-2 btn-sm"
                       href="{{route('admin.newsletters.beforedelete', ['id' => $newsletter->id])}}">Supprimer</a>
                    <a type="button-primary" class="btn btn-info btn-sm"
                       href="{{route('admin.newsletters.duplicate', ['id' => $newsletter->id])}}">Dupliquer</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav class="pagination justify-content-center">{{$newsletters->links()}}</nav>
@endsection

@extends('layouts.app')
@section('content')

    <div class="row justify-content-center">

        <div class="col-lg-10">
            <h1>{{__('Newsletter page title')}}</h1>
        </div>
        <div class="col-lg-2 mt-4">
            <a href="{{route('admin.newsletter.create')}}" class="btn btn-success mb-1"><span
                        class="fas fa-plus"></span> {{__('Create newsletter')  }}</a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{__('Date')  }}</th>
            <th>{{__('Title')  }}</th>
            <th>{{__('Status')  }}</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($newsletters as $newsletter)
            <tr>
                <th>{{$newsletter->created_at}}</th>
                <td>{{$newsletter->title}}</td>
                <td>
                    {{ $newsletter->status }} : <span class="badge">{{$newsletter->counter}}</span>
                </td>
                <td class="text-right">
                    <a class="btn btn-primary btn-sm"
                       href="{{route('admin.newsletter.edit', ['newsletter' => $newsletter])}}"><span
                                class="fas fa-pencil-alt"></span> {{__('Update')  }}</a>
                    <a class="btn btn-danger btn-sm"
                       href="{{route('admin.newsletter.beforedelete', ['newsletter' => $newsletter])}}"><span
                                class="far fa-trash-alt"></span> {{__('Delete')  }}</a>
                    <a class="btn btn-info btn-sm"
                       href="{{route('admin.newsletter.duplicate', ['newsletter' => $newsletter])}}"><span
                                class="far fa-copy"></span> {{__('Duplicate')  }}</a>
                    <a class="btn btn-info btn-sm"
                       href="{{route('admin.newsletter.show', ['newsletter' => $newsletter])}}"><span
                                class="far fa-eye"></span> {{__('Display')  }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav class="pagination justify-content-center">{{$newsletters->links()}}</nav>
@endsection

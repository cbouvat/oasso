@extends('layouts.app')

@section('content')

    <form method="post" action="{{ route('admin.newsletter.send', ['newsletter'=> $newsletter]) }}">
        @csrf
        <h1>{{__('Newsletter page title')}}</h1>
        <h2>{{__('send newsletter')  }}</h2>


        <label>
            <select class="custom-select" name="sendTo" required>
                <option value="" disabled selected>{{__('Send to :')  }}</option>
                <option value="0">{{__('Newsletter subscribers')  }}</option>
                <option value="1">{{__('All members')  }}</option>
                <option value="2">{{__('All admin members')  }}</option>
            </select>
        </label>

        <div class="card bg-light mb-3" style="max-width: 1200px;">
            <div class="card-header">
                {{__('Subject : ')  }} {{ $newsletter->title }}
            </div>
            <div class="card-body">
                {!! $newsletter->html_content !!}
            </div>
            <div class="card-footer bg-light">
                <div class="row justify-content-around ">
                    @if($newsletter->status == 'notSent')
                        <a class="btn btn-primary"
                           href="{{route('admin.newsletter.edit', ['newsletter' => $newsletter])}}">{{__('Update')  }}</a>
                        <button type="submit" class="btn btn-success">{{__('Send')  }}</button>
                    @else
                        <a class="btn btn-primary"
                           href="{{route('admin.newsletter.duplicate', ['newsletter' => $newsletter])}}">{{__('Duplicate')  }}</a>
                        <a class="btn btn-secondary" href="#">{{__('Already sent')  }}</a>
                    @endif
                    <a class="btn btn-danger" href="{{route('admin.newsletter.index')}}">{{__('Cancel')  }}</a>
                </div>
            </div>
        </div>
    </form>
@endsection
@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>{{__('Send Newsletter')}}</h1>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.newsletter.index') }}">Newsletter</a></li>
            <li class="breadcrumb-item">{{__('send')}}</li>
        </ol>
    </nav>
    <form method="post" action="{{ route('admin.newsletter.send', ['newsletter'=> $newsletter]) }}">
        @csrf
        <h3>{{__('Sent to :')}}</h3>
        <label>
            <select class="custom-select" name="sendTo" required>
                <option value="" disabled selected>{{__('Send to :')  }}</option>
                <option value="0">{{__('Newsletter subscribers')  }}</option>
                <option value="2">{{__('Admin members')  }}</option>
                <option value="1">{{__('All members')  }}</option>
            </select>
        </label>

        <div class="card bg-light mb-3" style="max-width: 1200px;">
            <div class="card-header">
                {{__('Subject : ')  }} {{ $newsletter->title }}
            </div>
            <div class="card-body">
                <h3>{{ __('HTML content :') }}</h3>
                {!! $newsletter->html_content !!}
            </div>
            <div class="card-body">
                <h3>{{ __('TEXT content :') }}</h3>
                {{ $newsletter->text_content }}
            </div>
            <div class="card-footer bg-light">
                <div class="row justify-content-around ">
                    @if($newsletter->status == 'notSent')
                        <button type="submit" class="btn btn btn-success"><span
                                    data-feather="send"></span> {{__('Send')  }}</button>
                    @else
                        <a class="btn btn-secondary" href="#">{{__('Already sent')  }}</a>
                    @endif
                </div>
            </div>
        </div>
    </form>
@endsection
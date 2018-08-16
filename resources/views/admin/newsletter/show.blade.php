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
        <div class="col-sm-3">
        <h3>{{__('Sent to :')}}</h3>

            <select class="custom-select" name="sendTo">
                <option selected value="subscribers">{{__('Newsletter subscribers')  }}</option>
                <option value="admin">{{__('Admin')  }}</option>
                <option value="all">{{__('All members')  }}</option>
            </select>
        </div>

        <div class="card bg-light mt-3 mb-3">
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
                    @elseif($newsletter->status == 'sending')
                        <p style="color: #1a7e75;">Sending...</p>
                    @else
                        <p style="color: #57554e;">Already sent</p>
                    @endif
                </div>
            </div>
        </div>
    </form>
@endsection
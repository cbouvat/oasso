@extends('layouts.emptyLayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Membership Renewal') }}</div>
                    <div class="card-body">
                        <form method="get" action="{{ route('home') }}">
                            @csrf

                            <div class="form-group row justify-content-center">
                                <label class="col-form-label">
                                    {{ __('Your ')  }} {{$subType->name}} {{__(' membership has been renewed until the ') }} {{$sub->subscription_date}}
                                </label>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label class="col-form-label">{{ __('Thank you !') }}</label>
                            </div>

                            <div class="form-group row justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Back to home page') }}
                                </button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
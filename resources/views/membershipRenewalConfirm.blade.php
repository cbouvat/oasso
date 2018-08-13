@extends('layouts.emptyLayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Membership Renewal') }}</div>
                    <div class="card-body">
                            <div class="form-group row justify-content-center">
                                <label class="col-form-label">
                                    {{ __('Your ')  }} {{$subType->name}} {{__(' membership has been renewed until the ') }} {{$sub->subscription_date}}
                                </label>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label class="col-form-label">{{ __('Thank you !') }}</label>
                            </div>

                            <div class="form-group row justify-content-center">
                                <a type="button" class="btn btn-primary" href={{Route('home')}}>
                                    {{ __('Back to home page') }}
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
@extends('layouts.emptyLayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Membership Renewal') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">{{ __('For Year :') }}</label>

                                <div class="col-md-6">
                                    <p><strong>{{date("Y")}}</strong></p>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">{{ __('Subscription type :') }}</label>

                                <div class="col-md-6">
                                    <p><strong>{{$ActualSubscriptionName->name}}</strong></p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">{{ __('Price :') }}</label>

                                <div class="col-md-6">
                                    <p><strong>{{$ActualSubscriptionName->amount}}</strong></p>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Accept') }}
                                    </button>

                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Cancel') }}
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

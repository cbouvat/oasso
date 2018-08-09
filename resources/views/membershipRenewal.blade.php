@extends('layouts.emptyLayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Membership Renewal') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('renewalConfirmation') }}">
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">{{ __('For Year :') }}</label>

                                <div class="col-md-6">
                                    <p><strong>{{date('Y')}}</strong></p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">{{ __('Subscription type :') }}</label>

                                <div class="col-md-6">

                                    <select id="selectedType" name="subscriptionTypePrice" class="custom-select"
                                            onchange='catchSelection(value)'>
                                        @foreach($subscriptionTypes as $subscriptionType)
                                            {{--We are putting both fields as value with a / separator so that we can use both information later--}}
                                            <option value="{{$subscriptionType->amount}}/{{$subscriptionType->id}}"
                                                    selected>{{$subscriptionType->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="subscriptionDate" value="{{date('Y').'-12-31'}}">

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">{{ __('Price :') }}</label>

                                <div class="col-md-6">

                                    <p id="subscriptionPrice"></p>

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-3">
                                    <input type="submit" class="btn btn-primary" value="{{ __('Accept') }}">

                                    <a href="/home" type="button" class="btn btn-primary">Cancel</a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // This script is made to display the price automatically when subscription type is changed
        function catchSelection(value) {
            var price = value.split("/", 2)[0];
            document.getElementById('subscriptionPrice').innerHTML = price;
        };
        $(document).ready(function () {
            catchSelection($("#selectedType option:selected").val());
        })

    </script>
@endsection
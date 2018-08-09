@extends('layouts.emptyLayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Membership Renewal') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('membershipRenewalCreate') }}">
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

                                    <select id="selectedType" name="subscriptionType" class="custom-select" onchange='catchSelection(value)'>

                                        @foreach($subscriptionTypes as $subscriptionType)
                                            <option id="choice" value="{{$subscriptionType->amount}}" selected>{{$subscriptionType->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right">{{ __('Price :') }}</label>

                                <div class="col-md-6">

                                    <p id="subscriptionPrice"></p>
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

    <script>
        function catchSelection(value){
            document.getElementById('subscriptionPrice').innerHTML = value;
        };
        $(document).ready(function () {
            catchSelection($("#selectedType option:selected").val());
        })

    </script>
@endsection
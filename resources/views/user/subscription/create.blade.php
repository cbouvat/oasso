@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ __('Membership Renewal') }}</h1>

                <form method="post" action="{{ route('user.subscription.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right">{{ __('For Year') }}</label>

                        <div class="col-md-6">
                            <p><strong>{{date('Y')}}</strong></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="selected-type" class="col-sm-4 col-form-label text-md-right">{{ __('Subscription type') }}</label>

                        <div class="col-md-6">

                            <select id="selected-type" name="type" class="custom-select">
                                @foreach($subscriptionTypes as $subscriptionType)
                                    <option value="{{ $subscriptionType->id }}"
                                            data-amount="{{ $subscriptionType->amount }}">
                                        {{ $subscriptionType->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right">{{ __('Price') }}</label>

                        <div class="col-md-6">
                            <p id="subscription-amount"></p>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-3">
                            <input type="submit" class="btn btn-primary" value="{{ __('Accept') }}">

                            <a href="{{route('user.user.index')}}" type="button" class="btn btn-primary">Cancel</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function selectedtype() {
                var amount = $('#selected-type option:selected').data('amount');
                $('#subscription-amount').text(amount + ' €');
            }

            $('#selected-type').change(selectedtype);
            selectedtype();
        </script>
    @endpush

@endsection
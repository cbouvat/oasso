@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <h1>Modification de l'Adhésion</h1>
            </div>

            <div class="col-12 col-md-8 offset-md-2 mt-5">

                <form method="POST" action="{{route('admin.subscription.store')}}"
                      aria-label="{{ __('Subscription') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="subscription_type"
                               class="col-md-4 col-form-label text-md-right">Identifiant de l'Adhérant</label>
                        <div class="col-md-6">
                            <input type="text" name="user_id"
                                   class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }} text-right"
                                   placeholder="Saisir l'id du donateur ici"
                                   value="{{ old('user_id') ? old('user_id') : ''}}"
                            >
                            @if ($errors->has('user_id'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subscription_type"
                               class="col-md-4 col-form-label text-md-right">Type d'Adhésion</label>
                        <div class="col-md-6">
                            <select id="subscription_type_id" name="subscription_type_id" class="custom-select">
                                @foreach($subscription_type as $subscription_type_id)
                                    <option value="{{ $subscription_type_id->id }}">
                                        {{ ucfirst($subscription_type_id->name)}} ({{$subscription_type_id->amount}}€)
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('subscription_type_id'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subscription_type_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="amount"
                               class="col-md-4 col-form-label text-md-right">{{ __('amount') }}</label>
                        <div class="col-md-6">
                            <input id="amount" type="text"
                                   class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}"
                                   name="amount" value="{{ old('amount') ? old('amount') : ''}}">
                            @if ($errors->has('amount'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="payment_methods"
                               class="col-md-4 col-form-label text-md-right">Moyen de paiement</label>
                        <div class="col-md-6">
                            <select id="payment_methods" name="payment_methods" class="custom-select">
                                @foreach($payments_methods as $payment_method)
                                    <option value="{{ $payment_method->id }}">
                                        {{ $payment_method->name}}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('payment_methods'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('payment_methods') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="subscription_date"
                               class="col-md-4 col-form-label text-md-right">Date de début</label>
                        <div class="col-md-6">
                            <input id="subscription_date" type="date"
                                   class="form-control{{ $errors->has('subscription_date') ? ' is-invalid' : '' }}"
                                   name="subscription_date"
                                   value="{{  date('Y-m-d')}}">
                            @if ($errors->has('subscription_date'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subscription_date') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Validate') }}
                            </button>
                        </div>
                    </div>


                </form>


            </div>
        </div>
    </div>

@endsection
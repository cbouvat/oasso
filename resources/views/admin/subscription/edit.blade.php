@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Modification de l'Adhésion de {{$subscription->user->firstname}} {{$subscription->user->lastname}}</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.subscription.index') }}">Subscription</a></li>
            <li class="breadcrumb-item">Modification de l'Adhésion
                de {{$subscription->user->firstname}} {{$subscription->user->lastname}}</li>
        </ol>
    </nav>


    <form action="{{route('admin.subscription.update', $subscription)}}" method="post">
        @csrf
        <div class="form-group row">
            <label for="subscription_type"
                   class="col-md-4 col-form-label text-md-right">Identifiant de l'Adhérant</label>
            <div class="col-md-8">
                <input type="text" name="user_id"
                       class="form-control text-right {{ $errors->has('user_id') ? ' is-invalid' : '' }}"
                       placeholder="Saisir l'id du donateur ici" value="{{$subscription->user_id}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="subscription_type"
                   class="col-md-4 col-form-label text-md-right">Type d'Adhésion</label>
            <div class="col-md-8">
                <select id="subscription_type_id" name="subscription_type_id"
                        class="custom-select{{ $errors->has('subscription_type_id') ? ' is-invalid' : '' }}">
                    @foreach($subscription_types as $subscription_type)
                        <option value="{{ $subscription_type->id }}" {{ $subscription_type->id == $subscription->subscription_type_id ? 'selected' : ''}}>
                            {{ $subscription_type->name }} ({{$subscription_type->amount}} €)
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="amount"
                   class="col-md-4 col-form-label text-md-right">Montant</label>
            <div class="col-md-8">
                <div class="input-group">
                    <input id="amount" type="text"
                           class="form-control text-right {{ $errors->has('amount') ? 'is-invalid' : '' }}"
                           name="amount"
                           value="{{ old('amount') ? old('amount') : $subscription->amount }}">
                    <div class="input-group-append">
                        <span class="input-group-text">€</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="payment_methods"
                   class="col-md-4 col-form-label text-md-right">Moyen de paiement</label>
            <div class="col-md-8">
                <select id="payment_methods" name="payment_methods"
                        class="custom-select {{ $errors->has('payment_methods') ? ' is-invalid' : '' }}">
                    @foreach($payments_methods as $payment_method)
                        <option value="{{ $payment_method->id }}" {{$payment_method->id == $subscription->payment->payment_method_id ? 'selected' : ''}}>

                            {{ $payment_method->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="subscription_date"
                   class="col-md-4 col-form-label text-md-right">Date de départ</label>
            <div class="col-md-8">
                <input id="subscription_date" type="date"
                       class="form-control{{ $errors->has('date_start') ? ' is-invalid' : '' }}"
                       name="date_start"
                       value="{{  old('date_start') ?  old('date_start') : $subscription->date_start->format('Y-m-d')}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8 offset-md-4">
                <input type="submit" class="btn btn-primary" value="Modifier">
            </div>
        </div>
    </form>

@endsection
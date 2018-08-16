@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Modification de l'adhésion de {{$subscription->user->firstname}} {{$subscription->user->lastname}}</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.subscription.index') }}">Adhésions</a></li>
            <li class="breadcrumb-item">Modifier Adhésion</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12 col-md-8 offset-md-2 mt-5">
            <form action="{{route('admin.subscription.update', $subscription)}}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="subscription_type"
                           class="col-md-4 col-form-label text-md-right">Type d'Adhésion</label>
                    <div class="col-md-6">
                        <select id="subscription_type_id" name="subscription_type_id" class="custom-select">
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
                    <div class="col-md-6">
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
                    <label for="date_start"
                           class="col-md-4 col-form-label text-md-right">Date de départ</label>
                    <div class="col-md-6">
                        <input id="date_start" type="date"
                               class="form-control{{ $errors->has('date_start') ? ' is-invalid' : '' }}"
                               name="date_start"
                               value="{{  old('date_start') ?  old('date_start') : $subscription->date_start}}">
                    </div>
                </div>

                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Editer">

                </div>
            </form>
        </div>
    </div>


@endsection
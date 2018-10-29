@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Gestion des dons</h1>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.gift.index') }}">Gestion des dons</a></li>
            <li class="breadcrumb-item"><a
                        href="{{ route('admin.user.show', $user) }}">{{ $user->firstname }} {{ $user->lastname }}</a>
            </li>
            <li class="breadcrumb-item">Dons de {{ $user->firstname }} {{ $user->lastname }}</li>
        </ol>
    </nav>
    <h2>Creer un Don de {{ $user->firstname }} {{ $user->lastname }}</h2>
    <div class="col-md-8 offset-md-2">
        <form action="{{route('admin.user.gift.store', $user)}}" method="post">
            @csrf
            <div class="form-group row">
                <label class="col-form-label col-md-2" for="amount">Montant</label>
                <div class="input-group  col-md-4">
                    <input type="text" id="amount" name="amount"
                           class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }} text-right">
                    <div class="input-group-append">
                        <span class="input-group-text">€</span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="payment_method_id" class="col-form-label col-md-2">Methode de paiement</label>
                <div class="input-group col-md-4">
                    <select class="custom-select form-control{{ $errors->has('amount') ? ' is-invalid' : '' }} text-center"
                            name="payment_method_id">
                        @foreach($payments_methods as $payment_method)
                            <option value="{{ $payment_method->id }}">
                                {{ $payment_method->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-8 offset-md-2">
                <input value="Valider" type="submit" class="btn btn-success pt-2 mt-2">
            </div>
        </form>
    </div>
    <div class="mt-5">
        <h2>Historique des dons de {{ $user->firstname }} {{ $user->lastname }}</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Montant</th>
                <th scope="col">Date</th>
                <th scope="col">Methode de paiement</th>
            </tr>
            </thead>
            <tbody>
            @forelse($user->gifts as $gift)
                <tr>
                    <th scope="row">{{ $gift->amount }} €</th>
                    <td>{{ $gift->created_at->format('d/m/Y') }}</td>
                    <td>{{ $gift->payment->paymentMethod->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">{{ $user->firstname }} {{ $user->lastname }} n'a réalisé aucun don pour le
                        moment ...
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
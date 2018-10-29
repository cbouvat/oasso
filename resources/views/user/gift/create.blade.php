@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Effectuer un Don</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item">Dons</li>
        </ol>
    </nav>
    <div class="col-md-8 offset-md-2">
        <h2>Participer d'avantage à l'Association {{config('app.name')}}</h2>
        <form action="{{route('user.gift.store')}}" method="post">
            @csrf
            <div class="form-group row">
                <label for="amount" class="col-form-label col-md-2">Montant</label>
                <div class="input-group col-md-4">
                    <input id="amount" type="text" name="amount" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">€</span>
                    </div>
                </div>
            </div>

            <div class="col-md-8 offset-md-2">
                <input value="Valider" type="submit" class="btn btn-success mt-2">
            </div>
        </form>
    </div>
    <div class="pt-5">
    <h2>Votre Historique de don</h2>
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
                    <td>{{ $gift->payment->paymentMethod->name}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Vous n'avez réalisé aucun don pour le moment ...</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
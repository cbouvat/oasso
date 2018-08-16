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
    <div class="col-12 col-md-4 offset-md-4 mt-5">
        <form action="{{route('admin.gift.store', $user)}}" method="post">
            @csrf
            <label class="col-form-label" for="amount">Montant</label>
            <div class="input-group">
                <input type="text" id="amount" name="amount"
                       class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }} text-right">
                <div class="input-group-append">
                    <span class="input-group-text">€</span>
                </div>
            </div>
            <input value="Valider" type="submit" class="btn btn-outline-success btn-block pt-2 mt-2">
        </form>
    </div>
    <div class="mt-5">
        <h2>Historique des dons de {{ $user->firstname }} {{ $user->lastname }}</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Montant</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            @forelse($user->gifts as $gift)
                <tr>
                    <th>{{ $gift->amount }} €</th>
                    <td>{{ $gift->created_at->format('d/m/Y') }}</td>
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
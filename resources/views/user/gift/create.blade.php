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
    <div>
        <div class="row">
            <div class="col-12">
                <div class="text-center ">
                    <h5>Participer d'avantage à l'Association {{config('app.name')}}</h5>

                    <div class="col-12 col-md-4 offset-md-4 mt-5">
                        <form action="{{route('user.gift.store')}}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="amount" class="form-control text-right">
                                <div class="input-group-append">
                                    <span class="input-group-text">€</span>
                                </div>
                            </div>
                            <div class="text-center">
                                <input value="Valider" type="submit" class="btn btn-outline-success btn-lg mt-2">

                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
        <div>
            <h2>Votre Historique de don</h2>
        </div>
        <div class="pt-5">
            <div class="text-center">
                <table class="table">
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
                            <td colspan="2">Vous n'avez réalisé aucun don pour le moment ...</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection
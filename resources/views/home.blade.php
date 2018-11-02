@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Bienvenue {{ $user->firstname }}</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Accueil</li>
        </ol>
    </nav>

    <div class="card-columns">
        @if($user->role->role_type_id == 2 || $user->role->role_type_id == 3)
        <div class="card">
            <h5 class="card-header">Outils administrateur</h5>
            <div class="card-body">
                <p class="card-text">{{ $subscriptionCount }} adhésions durant ces 12 derniers mois.</p>
                <p  class="card-text">La dernière newsletter date du {{ $lastNewsletter->created_at->format('d/m/Y') }}.</p>
                <hr>
                <a class="btn btn-primary btn-block"
                   href="{{ route('admin.user.create') }}"><span data-feather="users"></span> Ajouter un
                    membre</a>

                <a class="btn btn-primary btn-block"
                   href="{{ route('admin.subscription.create') }}"><span data-feather="award"></span>
                    Nouvelle adhésion</a>

                <a class="btn btn-primary btn-block"
                   href="{{ route('admin.newsletter.create') }}"><span data-feather="send"></span> Nouvelle
                    newsletter</a>
                <a class="btn btn-primary btn-block"
                   href="{{ route('admin.gift.create') }}"><span data-feather="gift"></span> Faire un
                    don</a>
            </div>
        </div>
        @endif
        <div class="card">
            <h5 class="card-header">Votre adhésion</h5>
            <div class="card-body">
            @if($user->subscriptions->first())
                @if($user->subscriptions->first()->date_end > \Carbon\Carbon::now()->toDateString())
                    <p class="card-text">
                        Vous êtes adhérent jusqu'au {{ $user->subscriptions->first()->date_end->format('d/m/Y') }}
                    </p>
                @else
                    <p class="card-text"> Votre adhésion a pris fin
                            le {{ $user->subscriptions->first()->date_end->format('d/m/Y') }} </p>
                    <a class="btn btn-danger btn-block"
                       href="{{ route('user.subscription.index') }}"><span data-feather="repeat"></span> Renouveller</a>
                @endif
            @else
                <p class="card-text">Vous n'êtes pas encore adhérent</p>
                <a class="btn btn-success btn-block" href="{{ route('user.subscription.index') }}"><span data-feather="plus"></span> Adhérer</a>
            @endif
            </div>
        </div>
    </div>
@endsection

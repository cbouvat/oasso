@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Historique</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item">Historique</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            <h4>Adhésions</h4>
            <table class="table">
                <thead>
                <tr>
                    <th>Depuis</th>
                    <th>Jusqu'au</th>
                    <th>Montant</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @if($user->subscriptions)
                    @forelse($user->subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->date_start->format('d/m/Y') }}</td>
                            <td>{{ $subscription->date_end->format('d/m/Y') }}</td>
                            <td>{{ $subscription->amount }}</td>
                            <td>{{ $subscription->subscriptionType->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Aucune adhésion</td>
                        </tr>
                    @endforelse
                @endif
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h4>Dons</h4>
            <table class="table">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Montant</th>
                </tr>
                </thead>
                <tbody>
                @if($user->gifts)
                    @forelse($user->gifts as $gift)
                        <tr>
                            <td>{{ $gift->created_at->format('d/m/Y') }}</td>
                            <td>{{ $gift->amount}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Aucun don</td>
                        </tr>
                    @endforelse
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
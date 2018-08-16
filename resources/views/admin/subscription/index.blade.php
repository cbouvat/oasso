@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>{{__('Subscription')}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{route('admin.subscription.create')}}" class="btn btn-success">Ajouter une adhésion</a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item">{{__('Subscription')}}</li>
        </ol>
    </nav>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Adhérant</th>
            <th scope="col">Type d'Adhésion</th>
            <th scope="col">Montant Donné <br> (Montant du Type)</th>
            <th scope="col">Debut</th>
            <th scope="col">Fin</th>
            <th scope="col">Methode de paiement</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($subscriptions as $subscription)
            <tr>
                <td scope="row">{{ $subscription->user->firstname }} {{ $subscription->user->lastname }}</td>
                <td>{{ $subscription->type->name }}</td>
                <th>{{ $subscription->amount }} € ({{ $subscription->type->amount }} €)</th>
                <td>{{ $subscription->date_start }}</td>
                <td>{{ $subscription->date_end }}</td>
                <td>{{ $subscription->payment ? $subscription->payment->paymentMethod->name : '' }}</td>
                <td class="text-right">
                    <a href="{{ route('admin.subscription.edit', $subscription) }}"
                       class="btn btn-sm btn-outline-primary"><span data-feather="edit"></span> Modifier</a>
                    <a href="{{ route('admin.subscription.beforedelete', $subscription) }}"
                       class="btn btn-sm btn-outline-danger"><span data-feather="trash"></span> Supprimer</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Aucune adhésion n'a été realisé</td>
            </tr>
        @endforelse

        </tbody>
    </table>
    {{ $subscriptions->links() }}

@endsection
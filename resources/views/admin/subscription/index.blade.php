@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div>
            <h1>
                Gestion des Adhérants
            </h1>
            <div class="text-right">
                <a class="btn btn-outline-success mb-3" href="{{route('admin.subscription.create')}}">Ajouter un Adhérant</a>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Adhérant</th>
                <th scope="col">Type d'Adhésion</th>
                <th scope="col">Montant Donné <br> (Montant du Type)</th>
                <th scope="col">Date</th>
                <th scope="col">Methode de paiement</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($subscriptions as $subscription)
                <tr>
                    <td scope="row">{{ $subscription->user->firstname }} {{ $subscription->user->lastname }}</td>
                    <td>{{ $subscription->subscriptionType->name }}</td>
                    <th>{{ $subscription->amount }} € ({{ $subscription->subscriptionType->amount }} €)</th>
                    <td>{{ $subscription->subscription_date }}</td>
                    <td> {{ $subscription->payment ? $subscription->payment->paymentMethod->name : '' }}</td>
                    <td class="text-right">
                        <a href="{{ route('admin.subscription.edit', $subscription) }}"
                           class="btn btn-sm btn-warning"><span class="fas fa-edit"></span></a>
                        <a href="{{ route('admin.subscription.beforedelete', $subscription) }}"
                           class="btn btn-sm btn-danger"><span class="fas fa-trash-alt"></span></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <th></th>
                    <th>Aucun don n'a été realisé</th>
                    <td></td>
                </tr>
            @endforelse

            </tbody>
        </table>
    </div>
    <div class="mt-5">
        {{ $subscriptions->links() }}
    </div>

@endsection
@extends('layouts.app')

@section('content')

    <div class="row pt-5">
        <div class="col-12">
            <div>
                <h1>
                    Gestion des Adhérants
                </h1>
                <div class="text-right">
                    <a class="btn btn-outline-success mb-3" href="{{route('admin.subscription.create')}}">Ajouter un Adhérant</a>
                </div>
            </div>
            <div class="text-center p-5 border border-success rounded">
                <table class="table">
                    <thead class="bg-success text-white">
                    <tr>
                        <th scope="col">Adhérant</th>
                        <th scope="col">Type d'Adhésion</th>
                        <th scope="col">Montant Donné <br> (Montant du Type)</th>
                        <th scope="col">Date</th>
                        <th scope="col">Methode de paiement</th>
                        <th scope="col">Editer</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($subscriptions as $subscription)
                        <tr>
                            <td scope="row">{{$subscription->user->firstname}} {{$subscription->user->lastname}}</td>
                            <td>{{$subscription->subscriptionType->name}}</td>
                            <th>{{$subscription->amount}} € <br> ({{$subscription->subscriptionType->amount}} €)</th>
                            <td>{{$subscription->subscription_date}}</td>
                            <td> {{ $subscription->payment ? $subscription->payment->paymentMethod->name : '' }}</td>

                            <td>
                                <a href="{{route('admin.subscription.edit', $subscription)}}"
                                   class="btn btn-warning"><span
                                            class="fas fa-edit"></span></a>
                            </td>
                            <td>
                                <a href="{{route('admin.subscription.beforeDelete', $subscription)}}"
                                   class="btn btn-danger"><span class="fas fa-trash-alt"></span></a>
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

        </div>
    </div>
    <div class="row justify-content-center mt-5">
        {{ $subscriptions->links() }}
    </div>

@endsection
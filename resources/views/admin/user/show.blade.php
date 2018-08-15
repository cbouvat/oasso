@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Membre {{ $user->id }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.subscription.create') }}" class="btn btn-sm btn-outline-success mr-2">Ajouter une
                Adhésion</a>
            <a href="#" class="btn btn-sm btn-outline-primary mr-2">Modifer</a>
            <a href="{{route('admin.user.beforedelete', ['user' => $user])}}" class="btn btn-sm btn-outline-danger">Supprimer</a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Membres</a></li>
            <li class="breadcrumb-item">Membre {{ $user->id }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-6">
            <div>
                <h2>Informations</h2>
            </div>
            <table class="table">
                <tbody>
                <tr>
                    <td class="font-weight-bold text-right">Prenom</td>
                    <td>{{ $user->firstname }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">Nom</td>
                    <td>{{ $user->lastname }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">Email</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">Adresse</td>
                    <td>{{ $user->address_line1 }} @if($user->addres_line2) <br>{{ $user->addres_line2 }} @endif
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">Code Postal</td>
                    <td>{{ $user->zipcode }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">Ville</td>
                    <td>{{ $user->city }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">Telephone</td>
                    <td>{{ $user->phone_number_1 }} @if( $user->phone_number_2 )
                            <br>{{ $user->phone_number_1 }} @endif
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">Newsletter</td>
                    <td>{{ $user->newsletter ? 'Oui' : 'Non' }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">Newspaper</td>
                    <td>{{ $user->newspaper ? 'Oui' : 'Non'}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">


            <h2>Adhésions</h2>
            <table class="table table-hover">
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
                            <td>{{ $subscription->subscription_date }}</td>
                            <td>{{ $subscription->subscription_date }}</td>
                            <td>{{ $subscription->amount }}</td>
                            <td>{{ $subscription->type->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Aucune adhésion</td>
                        </tr>
                    @endforelse
                @endif
                </tbody>
            </table>


            <h2>Dons</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Montant</th>
                    <th>Methode de paiement</th>
                </tr>
                </thead>
                <tbody>
                @if($user->gifts)
                    @forelse($user->gifts as $gift)
                        <tr>
                            <td>{{ $gift->created_at->format('d/m/Y') }}</td>
                            <td>{{ $gift->amount }}</td>
                            <td>{{ $gift->payment->paymentMethod->name }}</td>
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
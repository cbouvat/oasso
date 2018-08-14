@extends('layouts.app')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Membres</a></li>
                <li class="breadcrumb-item">Informations utilisateur</li>
            </ol>
        </nav>
    </div>
    <div class="">
        <div class="row d-flex justify-content-between mb-3">
            <a href="{{route('admin.subscription.create')}}" class="btn btn-outline-success">Ajouter une Adhésion</a>
            <a href="#" class="btn btn-outline-primary">Modifer</a>
            <a href="{{route('admin.user.beforedelete', ['user' => $user])}}"
               class="btn btn-outline-danger">Supprimer</a>
        </div>

        <div class="row ">
            <div class="col-6">
                <div>
                    <h1>Informations</h1>
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

                <div>
                    <div>
                        <h1>Adhésions</h1>
                    </div>
                    <div class="text-center">
                        <table class="table">
                            <thead class="bg-success text-white">
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
                                        <td>{{date('d/m/Y', strtotime($subscription->subscription_date))}}</td>
                                        <td>{{date('d/m/Y', strtotime($subscription->subscription_date."+1 year"))}}</td>
                                        <td>{{$subscription->amount}}</td>
                                        <td>{{$subscription->subscriptionType->name}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                    </tr>

                                @endforelse
                            @endif
                            </tbody>
                        </table>
                    </div>

                </div>
                <div>
                    <div>
                        <h1>Dons</h1>
                    </div>
                    <div class="text-center">
                        <table class="table">
                            <thead class="bg-success text-white">
                            <tr>
                                <th>Date</th>
                                <th>Montant</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($user->gifts)
                                @forelse($user->gifts as $gift)
                                    <tr>
                                        <td>{{$gift->created_at->format('d/m/Y')}}</td>
                                        <td>{{$gift->amount}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                    </tr>
                                @endforelse
                            @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>

        <div class="row justify-content-center mt-5">
        </div>
    </div>

@endsection
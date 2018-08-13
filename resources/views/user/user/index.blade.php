@extends('layouts.app')

@section('content')


    <div class="row ">
        <div>
            <h1>Mon Compte</h1>
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
    <div class="row d-flex justify-content-between mb-3">
        <a href="{{route('user.subscription.create')}}" class="btn btn-outline-success">Ajouter une Adhésion</a>
        <a href="#" class="btn btn-outline-primary">Modifer</a>
        <a href="{{route('user.user.beforedelete', ['user' => $user])}}"
           class="btn btn-outline-danger">Supprimer</a>
    </div>

@endsection
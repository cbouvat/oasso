@extends('layouts.app')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item">Gestion des dons</li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <div>
            <h1>Gestion des Dons</h1>
        </div>
        <table class="table table-hove">
            <thead>
            <tr>
                <th scope="col">Donateur</th>
                <th scope="col">Montant</th>
                <th scope="col">Date</th>
                <th scope="col">Methode de paiement</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($gifts as $gift)
                <tr>
                    <td scope="row">{{$gift->user->firstname}} {{$gift->user->lastname}}</td>
                    <th>{{$gift->amount}} €</th>
                    <td>{{$gift->created_at->format('d/m/Y')}}</td>
                    <td> {{ $gift->payment ? $gift->payment->paymentMethod->name : '' }}</td>

                    <td class="text-right">
                        <a href="{{route('admin.gift.edit', ['id' => $gift->id])}}"
                           class="btn btn-sm btn-warning"><span class="fas fa-edit"></span> Modifier</a>
                        <a href="{{route('admin.gift.beforeDelete', ['id' => $gift->id])}}"
                           class="btn btn-sm btn-danger"><span class="fas fa-trash-alt"></span> Supprimer</a>
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

    <div class="row justify-content-center mt-5">
        {{ $gifts->links() }}
    </div>

@endsection
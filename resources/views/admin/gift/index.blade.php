@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ '/home' }}">Accueil</a></li>
                <li class="breadcrumb-item">Gestion des dons</li>
            </ol>
        </nav>
    </div>
    <div class="row pt-5">
        <div class="col-12">
            <div>
                <h1>Gestion des Dons</h1>
            </div>
            <div class="text-center p-5 border border-success rounded">
                <table class="table">
                    <thead class="bg-success text-white">
                    <tr>
                        <th scope="col">Donateur</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Date</th>
                        <th scope="col">Methode de paiement</th>
                        <th scope="col">Editer</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($gifts as $gift)
                        <tr>
                            <td scope="row">{{$gift->user->firstname}} {{$gift->user->lastname}}</td>
                            <th>{{$gift->amount}} €</th>
                            <td>{{$gift->created_at->format('d/m/Y')}}</td>
                            <td> {{ $gift->payment ? $gift->payment->paymentMethod->name : '' }}</td>

                            <td>
                                <a href="{{route('admin.gift.edit', ['id' => $gift->id])}}"
                                   class="btn btn-warning"><span
                                            class="fas fa-edit"></span></a>
                            </td>
                            <td>
                                <a href="{{route('admin.gift.beforeDelete', ['id' => $gift->id])}}"
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
        {{ $gifts->links() }}
    </div>

@endsection
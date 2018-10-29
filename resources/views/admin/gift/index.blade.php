@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Gestion des dons</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item">Gestion des dons</li>
        </ol>
    </nav>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Donateur</th>
            <th scope="col">Montant</th>
            <th scope="col">Methode de paiement</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($gifts as $gift)
            <tr>
                <td scope="row">{{ $gift->created_at->format('d/m/Y') }}</td>
                <td>{{ $gift->user->firstname.' '.$gift->user->lastname }}</td>
                <th>{{ $gift->amount }} €</th>
                <td> {{ $gift->payment ? $gift->payment->paymentMethod->name : '' }}</td>
                <td class="text-right">
                    <a href="{{route('admin.gift.edit', ['id' => $gift->id])}}"
                       class="btn btn-sm btn-outline-primary"><span data-feather="edit"></span> Modifier</a>
                    <a href="{{route('admin.gift.delete', ['id' => $gift->id])}}"
                       class="btn btn-sm btn-outline-danger"><span data-feather="trash"></span> Supprimer</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Aucun don n'a été realisé</td>
            </tr>
        @endforelse

        </tbody>
    </table>

    {{ $gifts->links() }}

@endsection
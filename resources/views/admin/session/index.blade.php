@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Membres connectés</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item">Membres connectés</li>
        </ol>
    </nav>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Nom.</th>
            <th scope="col">Rôle</th>
            <th scope="col">Adresse IP</th>
            <th scope="col">Dernière activité</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($sessions as $session)
            <tr>
                <th scope="row">{{ $session->user->lastname }}</th>
                <td>{{ $session->user->role->roletype->name }}</td>
                <td>{{ $session->ip_address }}</td>
                <td>{{ $session->last_activity }}</td>
                <td class="text-right">
                    <a class="btn btn-sm btn-outline-danger"
                       href="{{ route('admin.session.delete', $session) }}"><span
                                data-feather="trash"></span> Déconnecter ce membre</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $sessions->links() }}

@endsection
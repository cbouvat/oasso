@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Membres</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-outline-success">Ajouter un membre</a>
        </div>
    </div>

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item">Membres</li>
            </ol>
        </nav>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Num.</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->firstname }}</td>
                <td class="text-right">
                    <a href="{{ route('admin.user.show', $user) }}" class="btn btn-sm btn-outline-primary"><span
                                class="fas fa-pencil-alt"></span> Modifier</a>
                    <a class="btn btn-sm btn-outline-danger"
                       href="{{ route('admin.user.beforedelete', $user) }}"><span
                                class="far fa-trash-alt"></span> Supprimer</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">{{ $users->links() }}</div>
@endsection
@extends('layouts.app')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item">Membres</li>
            </ol>
        </nav>
    </div>
    <h1>Liste des membres</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->firstname }}</td>
                <td class="text-right">
                    <a href="{{route('admin.user.show', $user)}}" class="btn btn-sm btn-primary"><span
                                class="fas fa-pencil-alt"></span> Modifier</a>
                    <a class="btn btn-sm btn-danger"
                       href="{{ route('admin.user.beforedelete', ['user' => $user->id]) }}"><span
                                class="far fa-trash-alt"></span> Supprimer</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">{{ $users->links() }}</div>
@endsection
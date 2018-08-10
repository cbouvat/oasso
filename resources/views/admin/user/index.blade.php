@extends('layouts.app')

@section('content')
    <h1>Liste des membres</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->firstname }}</td>
                <td>
                    <button type="button" class="btn btn-primary">Modifier</button>
                    <a type="button" class="btn btn-danger"
                       href="{{ route('admin.users.beforedelete', ['user' => $user->id]) }}">Supprimer</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">{{ $users->links() }}</div>
@endsection
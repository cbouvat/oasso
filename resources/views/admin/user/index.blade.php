@extends('layouts.app')

@section('content')
    <h1>Liste des membres</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Voir</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->firstname }}</td>
                <td>
                    <a href="{{route('admin.user.show')}}" class="btn btn-success"><span class="fas fa-arrow-right"></span></a>
                </td>
                <td>
                    <a class="btn btn-primary" href="#"><span class="fas fa-pencil-alt"></span></a>
                </td>
                <td>
                    <a class="btn btn-danger"
                       href="{{ route('admin.user.beforedelete', ['user' => $user->id]) }}"><span
                                class="far fa-trash-alt"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">{{ $users->links() }}</div>
@endsection
@extends('layouts.app')

@section('content')
    <h1>Liste des membres</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->firstname }}</td>
                <td class="text-right">
                    <a href="{{route('admin.user.show', $user)}}" class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span></a>
                    <a class="btn btn-sm btn-danger"
                       href="{{ route('admin.user.beforedelete', ['user' => $user->id]) }}"><span
                                class="far fa-trash-alt"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">{{ $users->links() }}</div>
@endsection
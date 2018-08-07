@extends('layouts.app')

@section('content')
    <h1>Liste des membres</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="col">{{$user->id}}</th>
                <td scope="col">{{$user-> firstname}}</td>
                <td scope="col">{{$user->lastname}}</td>
                <td scope="col">
                    <button type="button" class="btn btn-primary">Modifier</button>
                    <a type="button" class="btn btn-danger"
                       href="{{route('admin.users.beforedelete', ['user' => $user->id])}}">Supprimer</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">{{$users->links()}}</div>
@endsection
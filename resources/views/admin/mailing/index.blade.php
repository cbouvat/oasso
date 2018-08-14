@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ '/home' }}">Accueil</a></li>
                <li class="breadcrumb-item">Mailing</li>
            </ol>
        </nav>
    </div>
    <h1>Liste des mails</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Date</th>
            <th>Modifier</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mailings as $mailing)
            <tr>
                <td>{{ $mailing->title }}</td>
                <td>{{ $mailing->created_at->format('d/m/Y') }}</td>
                <td>
                    <a type="button" class="btn btn-primary" href="{{ route('admin.mailing.edit', ['id' => $mailing->id]) }}">Modifier</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">{{ $mailings->links() }}</div>
@endsection
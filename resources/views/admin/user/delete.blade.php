@extends('layouts.app')

@section('content')
    <h1 class="mt-5 pt-5 text-center">Souhaitez-vous supprimer {{ $user->firstname }} {{ $user->lastname }} ?</h1>
    <div class="text-center">
        @if($user->subscriptions->count() > 0 || $user->gifts->count() > 0 || $user->newlsetter->count() > 0)
            <p>Ce membre a effectué un adhésion, un don, ou une newsletter et ne peut pas etre completement supprimé de la base de donnée</p>
            @else
            <p>Ce membre n'a pas d'adhésion ou de don et sera completement supprimé de la base de donnée</p>
        @endif


        <form action="{{ route('admin.user.destroy', $user) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Oui">
            <a type="button" class="btn btn-secondary ml-2" href="{{ url()->previous() }}">Non</a>
        </form>
    </div>
@endsection
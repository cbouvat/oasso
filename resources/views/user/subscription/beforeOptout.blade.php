@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Désabonnement</h1>
    </div>

    <p>
        Bonjour {{$user->firstname}}
        {{__('Voulez-vous vraiment vous désabonner ?')}}
    </p>
    <form method="post" action="{{route('outnewsletter', ['user' => $user->id])}}">
        @csrf
        <input type="email" value="{{ $user->email }}">
        <button type="submit" class="btn btn-secondary">{{__('Se désabonner')}}</button>
    </form>
@endsection
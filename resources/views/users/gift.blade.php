@extends('layouts.app')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div>
                    <h1>Faire un Don</h1>
                </div>
                <div class="text-center p-5 border border-success rounded">
                    <h5>Participer d'avantage à l'Association {{config('app.name')}}</h5>

                    <div class="col-12 col-md-4 offset-md-4 mt-5">
                        <form action="{{route('front.user.give')}}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="amount" class="form-control text-right">
                                <div class="input-group-append">
                                    <span class="input-group-text">€</span>
                                </div>
                            </div>
                            @if($user->role->id == "1")
                                <input type="hidden" name="from_user_id" value="{{$user->id}}">
                            @else
                                <input type="text" name="from_user_id" class="form-control text-right mt-2" placeholder="ID du donateur">
                            @endif
                            <button type="submit" class="btn btn-outline-success btn-block mt-3">
                                <h2>Donner</h2>
                            </button>
                        </form>
                    </div>

                </div>

            </div>

        </div>
        <div class="row pt-5">
            <div class="col-12">
                <div>
                    <h1>Votre Historique de don</h1>
                </div>
                <div class="text-center p-5 border border-success rounded">
                    <table class="table">
                        <thead class="bg-success text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Montant</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($user->gifts as $gift)
                            <tr>
                                <td scope="row">{{$user->firstname}} {{$user->lastname}}</td>
                                <th>{{$gift->amount}} €</th>
                                <td>{{$gift->created_at->format('d/m/Y')}}</td>
                            </tr>
                        @empty
                            <tr>
                                <th></th>
                                <th>Vous n'avez réalisé aucun don pour le moment ...</th>
                                <td></td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
@endsection
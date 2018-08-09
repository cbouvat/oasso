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
                        <form action="{{route('user.gift.create')}}" method="post">
                            @csrf
                            <div class="input-group">
                                @if ($errors->has('amount'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                                <input type="text" name="amount" class="form-control text-right">
                                <div class="input-group-append">
                                    <span class="input-group-text">€</span>
                                </div>
                            </div>
                            @if($user->role->id == "1")
                                <input type="hidden" name="from_user_id" value="{{$user->id}}">
                            @else
                                <input type="text" name="from_user_id"
                                       class="form-control border border-info text-center mt-2"
                                       placeholder="Saisir l'id du donateur ici">
                                <div class="text-center mt-5">
                                    <input type="checkbox" name="from_me" value="{{$user->id}}">
                                    <label for="from_me">De ma part, {{$user->firstname}} {{$user->lastname}}</label>
                                </div>
                            @endif
                            <input value="Donner" type="submit" class="btn btn-outline-success btn-block pt-2 mt-2">
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
                            <th scope="col">Donateur</th>
                            <th scope="col">Montant</th>
                            <th scope="col">Date</th>
                            @if($user->role->id != 1)
                                <th>Editer</th>
                                <th>Supprimer</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($user->gifts as $gift)
                            <tr>
                                <td scope="row">{{$user->firstname}} {{$user->lastname}}</td>
                                <th>{{$gift->amount}} €</th>
                                <td>{{$gift->created_at->format('d/m/Y')}}</td>
                                @if($user->role->id != 1)
                                    <td>
                                        <a href="{{route('admin.gift.edit', ['id' => $gift->id])}}"
                                           class="btn btn-warning"><span class="fas fa-trash-alt"></span></a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.gift.destroy', ['id' => $gift->id])}}"
                                           class="btn btn-danger"><span class="fas fa-trash-alt"></span></a>
                                    </td>
                                @endif
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
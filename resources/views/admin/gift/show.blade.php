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
                        <form action="{{route('admin.gift.create')}}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="amount" class="form-control text-right">
                                <div class="input-group-append">
                                    <span class="input-group-text">€</span>
                                </div>

                                <select class="form-control text-center ml-3" name="payment_methods">
                                    @foreach($paymentsMethods as $paymentMethod)
                                        <option value="{{ $paymentMethod->id }}">
                                            {{ $paymentMethod->name}}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <input type="text" name="from_user_id"
                                   class="form-control border border-info text-center mt-2"
                                   placeholder="Saisir l'id du donateur ici">
                            <div class="text-center mt-5">
                                <input type="checkbox" name="from_me" value="{{$user->id}}">
                                <label for="from_me">De ma part, {{$user->firstname}} {{$user->lastname}}</label>
                            </div>

                            <button type="submit" class="btn btn-outline-success btn-block mt-3 pt-3">
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
                            <th scope="col">Donateur</th>
                            <th scope="col">Montant</th>
                            <th scope="col">Date</th>
                            <th scope="col">Methode de paiement</th>
                            <th scope="col">Editer</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($user->gifts as $gift)
                            <tr>
                                <td scope="row">{{$user->firstname}} {{$user->lastname}}</td>
                                <th>{{$gift->amount}} €</th>
                                <td>{{$gift->created_at->format('d/m/Y')}}</td>
                                <td> {{ $gift->payment ? $gift->payment->paymentMethod->name : '' }}</td>

                                <td>
                                    <a href="{{route('admin.gift.edit', ['id' => $gift->id])}}" class="btn btn-warning"><span
                                                class="fas fa-edit"></span></a>
                                </td>
                                <td>
                                    <a href="{{route('admin.gift.beforeDelete', ['id' => $gift->id])}}"
                                       class="btn btn-danger"><span class="fas fa-trash-alt"></span></a>
                                </td>
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
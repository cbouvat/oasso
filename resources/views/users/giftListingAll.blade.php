@extends('layouts.app')

@section('content')

    <div class="row pt-5">
        <div class="col-12">
            <div>
                <h1>Gestion des Dons</h1>
            </div>
            <div class="text-center p-5 border border-success rounded">
                <table class="table">
                    <thead class="bg-success text-white">
                    <tr>
                        <th scope="col">Donateur</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Date</th>
                        @if(Auth::user()->role->id != 1)
                            <th>Editer</th>
                            <th>Supprimer</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($gifts as $gift)
                        <tr>
                            <td scope="row">{{$gift->user->firstname}} {{$gift->user->lastname}}</td>
                            <th>{{$gift->amount}} €</th>
                            <td>{{$gift->created_at->format('d/m/Y')}}</td>
                            <td>
                                <a href="{{route('admin.gift.edit', ['id' => $gift->id])}}"
                                   class="btn btn-warning"><span
                                            class="fas fa-trash-alt"></span></a>
                            </td>
                            <td>
                                <a href="{{route('admin.gift.destroy', ['id' => $gift->id])}}"
                                   class="btn btn-danger"><span class="fas fa-trash-alt"></span></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th></th>
                            <th>Aucun don n'a été realisé</th>
                            <td></td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="row justify-content-center mt-5">
        {{ $gifts->links() }}
    </div>

@endsection
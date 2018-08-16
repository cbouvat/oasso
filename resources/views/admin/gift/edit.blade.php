@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Modification du Don de {{ $gift->user->firstname }} {{ $gift->user->lastname }},
            le {{ $gift->created_at->format('d/m/Y') }}</h1>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.gift.index') }}">Gestion des dons</a></li>
            <li class="breadcrumb-item">Modification du don
            </li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="col-12 col-md-4 offset-md-4 mt-5">
                <form action="{{route('admin.gift.update', ['id' => $gift->id])}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="amount" class="col-sm-4 col-form-label">Montant</label>
                        <div class="input-group col-sm-8">
                            <input type="text" name="amount" class="form-control text-right"
                                   value="{{ $gift->amount }}">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>

                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-outline-primary btn-lg " value="Modifier">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
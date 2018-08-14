@extends('layouts.app')


@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.gift.index') }}">Gestion des dons</a></li>
                <li class="breadcrumb-item">Modification du dons</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div>
                <h1>Modification du Don</h1>
            </div>
            <div class="text-center p-5 border border-success rounded">
                <h5>Don de {{ $gift->user->firstname }} {{ $gift->user->lastname }}, le {{ $gift->created_at->format('d/m/Y') }}</h5>

                <div class="col-12 col-md-4 offset-md-4 mt-5">
                    <form action="{{route('admin.gift.update', ['id' => $gift->id])}}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="amount" class="form-control text-right" value="{{ $gift->amount }}">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Modifier">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
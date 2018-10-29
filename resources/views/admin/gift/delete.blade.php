@extends('layouts.app')

@section('content')
    <h1 class="mt-5 pt-5 text-center">Souhaitez-vous supprimer ce don ?</h1>
    <div class="text-center mt-4 pt-4">
        <form action="{{ route('admin.gift.destroy', $gift) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger btn-lg mr-2">Oui</button>
            <a class="btn btn-secondary btn-lg ml-2" href="{{route('admin.gift.index')}}">Non</a>
        </form>
    </div>
@endsection
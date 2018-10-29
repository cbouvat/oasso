@extends('layouts.app')

@section('content')
    <h1 class="mt-5 pt-5 text-center">Souhaitez-vous supprimer ce don ?</h1>
    <div class="text-center mt-4 pt-4">
        <form action="{{ route('admin.gift.destroy', $gift) }}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="Oui" class="btn btn-danger mr-2">
            <a class="btn btn-secondary ml-2" href="{{route('admin.gift.index')}}">Non</a>
        </form>
    </div>
@endsection
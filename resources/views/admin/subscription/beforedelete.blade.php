@extends('layouts.app')

@section('content')
    <h1 class="mt-5 pt-5 text-center">Souhaitez-vous supprimer cette Adhésion ?</h1>
    <div class="text-center mt-4 pt-4">
        <a type="button" class="btn btn-danger btn-lg mr-2"
           href="{{route('admin.subscription.destroy', $subscription->id)}}">Oui</a>
        <a type="button" class="btn btn-secondary btn-lg ml-2" href="{{route('admin.subscription.index')}}">Non</a>
    </div>
@endsection
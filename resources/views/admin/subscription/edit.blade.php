@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <h1>Modification de l'Adhésion</h1>
            </div>
            <div class="text-center p-5 border border-success rounded">
                <h5>Don de {{$subscription->user->firstname}} {{$subscription->user->lastname}}</h5>

                <div class="col-12 col-md-4 offset-md-4 mt-5">
                    <form action="{{route('admin.gift.update', ['id' => $subscription->id])}}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="amount" class="form-control text-right" value="{{$subscription->amount}}">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                        <div>
                            <label class=" mt-2" for="from_user_id">Identifiant du donateur</label>
                            <input type="text" name="from_user_id"
                                   class="form-control border border-info text-center"
                                   placeholder="Saisir l'id du donateur ici" value="{{$subscription->user_id}}">

                        </div>
                        <button type="submit" class="btn btn-outline-success btn-block mt-3 pt-3">
                            <h2>Editer</h2>
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>

@endsection
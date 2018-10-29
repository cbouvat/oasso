@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Bienvenue {{ $user->firstname }}</h1>
    </div>
    <div class="row">
        @if($user->role->role_type_id == 2 || $user->role->role_type_id == 3)
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-12">
                        <h3>{{ $subCount }} personnes ont adhéré durant ces 12 derniers mois.</h3>
                    </div>
                    <div class="col-12">
                        <h3>La dernière newsletter date du {{ $newsletter->created_at->format('d/m/Y') }}.</h3>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-outline-primary btn-block py-2 my-2"
                           href="{{ route('admin.user.create') }}"><span data-feather="users"></span> Ajouter un
                            membre</a>

                        <a class="btn btn-outline-primary btn-block py-2 my-2"
                           href="{{ route('admin.subscription.create') }}"><span data-feather="award"></span>
                            Nouvelle adhésion</a>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-outline-primary btn-block py-2 my-2"
                           href="{{ route('admin.newsletter.create') }}"><span data-feather="send"></span> Nouvelle
                            newsletter</a>
                        <a class="btn btn-outline-primary btn-block py-2 my-2"
                           href="{{ route('admin.gift.create') }}"><span data-feather="gift"></span> Faire un
                            don</a>
                    </div>
                </div>
            </div>
        @endif
        <div class="{{ $user->role->role_type_id != 1 ? 'col-sm-4' : 'col-12' }}">
            <div class="text-center">
                @if($user->subscriptions->first())
                    @if($user->subscriptions->first()->date_end > date('Y-m-d'))
                        <div>
                            <h3> Vous êtes adhérent jusqu'au
                                le {{ $user->subscriptions->first()->date_start->format('d/m/Y') }} </h3>
                        </div>
                    @else
                        <div>
                            <h3> Votre adhésion a pris fin
                                le {{ $user->subscriptions->first()->date_end->format('d/m/Y') }} </h3>
                        </div>
                        <a class="btn-lg btn-success btn py-2 my-2"
                           href="{{ route('user.subscription.index') }}">Renouveller</a>
                    @endif
                @else
                    <h3> Vous n'êtes pas encore adhérent. </h3>
                    <div class="py-2">
                        <a class="btn-lg btn-success btn py-2 my-2"
                           href="{{ route('user.subscription.index') }}"><span data-feather="plus"></span> Adhérer</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

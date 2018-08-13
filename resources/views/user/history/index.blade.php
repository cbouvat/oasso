@extends('layouts.app')

@section('content')

    <div>
        <h1>Historique</h1>
    </div>
    <div class="row ">
        <div class="col-6">

            <div>
                <h4>Adhésions</h4>
                <div class="text-center">
                    <table class="table">
                        <thead class="bg-success text-white">
                        <tr>
                            <th>Depuis</th>
                            <th>Jusqu'au</th>
                            <th>Montant</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($user->subscriptions)

                            @forelse($user->subscriptions as $subscription)
                                <tr>
                                    <td>{{date('d/m/Y', strtotime($subscription->subscription_date))}}</td>
                                    <td>{{date('d/m/Y', strtotime($subscription->subscription_date."+1 year"))}}</td>
                                    <td>{{$subscription->amount}}</td>
                                    <td>{{$subscription->subscriptionType->name}}</td>
                                </tr>
                            @empty
                                <tr>
                                </tr>

                            @endforelse
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="col-6">
            <div>
                <h4>Dons</h4>
                <div class="text-center">
                    <table class="table">
                        <thead class="bg-success text-white">
                        <tr>
                            <th>Date</th>
                            <th>Montant</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($user->gifts)
                            @forelse($user->gifts as $gift)
                                <tr>
                                    <td>{{$gift->created_at->format('d/m/Y')}}</td>
                                    <td>{{$gift->amount}}</td>
                                </tr>
                            @empty
                                <tr>
                                </tr>
                            @endforelse
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

@endsection
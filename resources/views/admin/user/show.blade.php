@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>{{ __('app.Member') }} {{ $user->id }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.subscription.create') }}" class="btn btn-success mr-2">{{ __('app.Add a subscription') }}</a>
            <a href="#" class="btn btn-primary mr-2">{{ __('app.Update') }}</a>
            <a href="{{route('admin.user.beforedelete', ['user' => $user])}}" class="btn btn-danger">{{ __('app.Remove') }}</a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('app.Home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">{{ __('app.Members') }}</a></li>
            <li class="breadcrumb-item">{{ __('app.Member') }} {{ $user->id }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-6">
            <div>
                <h2>{{ __('app.Informations') }}</h2>
            </div>
            <table class="table">
                <tbody>
                <tr>
                    <td class="font-weight-bold text-right">{{ __('app.Firstname') }}</td>
                    <td>{{ $user->firstname }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">{{ __('app.Lastname') }}</td>
                    <td>{{ $user->lastname }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">{{ __('app.E-Mail Address') }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">{{ __('app.Address') }}</td>
                    <td>{{ $user->address_line1 }} @if($user->addres_line2) <br>{{ $user->addres_line2 }} @endif
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">{{ __('app.Zipcode') }}</td>
                    <td>{{ $user->zipcode }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">{{ __('app.City') }}</td>
                    <td>{{ $user->city }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">{{ __('app.Phone 1') }}</td>
                    <td>{{ $user->phone_number_1 }} @if( $user->phone_number_2 )
                            <br>{{ $user->phone_number_1 }} @endif
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">{{ __('app.Newsletter') }}</td>
                    <td>{{ $user->newsletter ? 'Oui' : 'Non' }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-right">{{ __('app.Newspaper') }}</td>
                    <td>{{ $user->newspaper ? 'Oui' : 'Non'}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">


            <h2>{{ __('app.Subscriptions') }}</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>{{ __('app.Since') }}</th>
                    <th>{{ __('app.Until') }}</th>
                    <th>{{ __('app.Amount') }}</th>
                    <th>{{ __('app.Status') }}</th>
                </tr>
                </thead>
                <tbody>
                @if($user->subscriptions)

                    @forelse($user->subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->subscription_date }}</td>
                            <td>{{ $subscription->subscription_date }}</td>
                            <td>{{ $subscription->amount }}</td>
                            <td>{{ $subscription->type->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">{{ __('app.No subscription') }}</td>
                        </tr>
                    @endforelse
                @endif
                </tbody>
            </table>


            <h2>{{ __('app.Gifts') }}</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>{{ __('app.Date') }}</th>
                    <th>{{ __('app.Amount') }}</th>
                    <th>{{ __('app.Payment method') }}</th>
                </tr>
                </thead>
                <tbody>
                @if($user->gifts)
                    @forelse($user->gifts as $gift)
                        <tr>
                            <td>{{ $gift->created_at->format('d/m/Y') }}</td>
                            <td>{{ $gift->amount }}</td>
                            <td>{{ $gift->payment->paymentMethod->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">{{ __('app.No gift') }}</td>
                        </tr>
                    @endforelse
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
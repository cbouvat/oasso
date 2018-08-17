@extends('layouts.app')

@section('content')

    <div>
        <h1>{{ __('app.My account') }}</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('app.Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('app.My account') }}</li>
        </ol>
    </nav>

    <div class="row ">
        <table class="table">
            <tbody>
            <tr>
                <td class="font-weight-bold text-right">{{ __('app.Lastname') }}</td>
                <td>{{ $user->lastname }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold text-right">{{ __('app.Firstname') }}</td>
                <td>{{ $user->firstname }}</td>
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
                <td class="font-weight-bold text-right">{{ __('app.Phone number') }}</td>
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
    <div class="row d-flex justify-content-end mb-3">
        <a href="{{ route('user.edit') }}" class="btn btn-outline-primary">{{ __('app.Update') }}</a>
        <a href="{{ route('user.delete') }}" class="btn btn-outline-danger">{{ __('app.Remove') }}</a>
    </div>

@endsection
@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>{{ __('app.Manage gifts') }}</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('app.Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('app.Manage gifts') }}</li>
        </ol>
    </nav>

    <table class="table table-hove">
        <thead>
        <tr>
            <th scope="col">{{ __('app.Donor') }}</th>
            <th scope="col">{{ __('app.Amount') }}</th>
            <th scope="col">{{ __('app.Date') }}</th>
            <th scope="col">{{ __('app.Payment method') }}</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($gifts as $gift)
            <tr>
                <td scope="row">@if($gift->user){{ $gift->user->firstname.' '.$gift->user->lastname }}@else<del>Deleted
                        User</del>@endif</td>
                <th>{{ $gift->amount }} €</th>
                <td>{{ $gift->created_at->format('d/m/Y') }}</td>
                <td> {{ $gift->payment ? $gift->payment->paymentMethod->name : '' }}</td>
                <td class="text-right">
                    <a href="{{route('admin.gift.edit', ['id' => $gift->id])}}"
                       class="btn btn-sm btn-outline-primary"><span data-feather="edit"></span> {{ __('app.Update') }}</a>
                    <a href="{{route('admin.gift.delete', ['id' => $gift->id])}}"
                       class="btn btn-sm btn-outline-danger"><span data-feather="trash"></span> {{ __('app.Remove') }}</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">{{ __('app.No gift') }}</td>
            </tr>
        @endforelse

        </tbody>
    </table>

    {{ $gifts->links() }}

@endsection
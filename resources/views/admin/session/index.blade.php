@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>{{ __('app.Connected members') }}</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('app.Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('app.Connected members') }}</li>
        </ol>
    </nav>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">{{ __('app.Lastname') }}.</th>
            <th scope="col">{{ __('app.Role') }}</th>
            <th scope="col">{{ __('app.Ip address') }}</th>
            <th scope="col">{{ __('app.Last activity') }}</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($sessions as $session)
            <tr>
                <th scope="row">{{ $session->user->lastname }}</th>
                <td>{{ $session->user->role->roletype->name }}</td>
                <td>{{ $session->ip_address }}</td>
                <td>{{ $session->last_activity }}</td>
                <td class="text-right">
                    <form action="{{ route('admin.session.delete', $session) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger"><span data-feather="trash"></span>
                            {{ __('app.Logout') }}
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $sessions->links() }}

@endsection
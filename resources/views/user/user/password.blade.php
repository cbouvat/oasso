@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>{{ __('app.Password') }}</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('app.Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('app.Password') }}</li>
        </ol>
    </nav>

    <form method="post" action="{{ route('user.password.update') }}">
        @csrf
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('app.Password') }}</label>
            <div class="col-md-8">
                <input id="password" type="password"
                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       name="password" required>
                @if ($errors->has('password'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('app.New Password') }}</label>
            <div class="col-md-8">
                <input id="new_password" type="password"
                       class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}"
                       name="new_password" required>
                @if ($errors->has('new_password'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('new_password') }}</strong>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="new_password_confirmation"
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Confirm Password') }}</label>
            <div class="col-md-8">
                <input id="new_password_confirmation" type="password" class="form-control"
                       name="new_password_confirmation" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary"> {{ __('app.Save') }} </button>
            </div>
        </div>
    </form>
@endsection

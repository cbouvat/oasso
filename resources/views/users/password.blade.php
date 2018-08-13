@extends('layouts.app')

@section('content')
    <h1>{{ __('Change your password') }}</h1>

    <div class="row justify-content-center m-5">
        <div class="card-body">
            <form method="POST" action="{{ route('user.updatepassword') }}">
                @csrf

                <div class="form-group row">
                    <label for="actual-password"
                           class="col-md-4 col-form-label text-md-right">{{ __('Actual password') }}</label>
                    <div class="col-md-6">
                        <input id="actual-password" type="password" class="form-control"
                               name="actual-password" required>
                    </div>
                    @if ($errors->has('actual-password'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ $errors }}</li>
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="password"
                           class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_confirmation"
                           class="col-md-4 col-form-label text-md-right">{{ __('Password confirmation') }}</label>
                    <div class="col-md-6">
                        <input id="password_confirmation" type="password" class="form-control"
                               name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
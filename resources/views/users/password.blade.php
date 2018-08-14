@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ '/home' }}">Accueil</a></li>
                <li class="breadcrumb-item">Mot de passe</li>
            </ol>
        </nav>
    </div>
    <h1>{{ __('Change your password') }}</h1>

    <div class="row justify-content-center m-5">
        <div class="card-body">
            <form method="post" action="{{ route('user.password.update') }}">
                @csrf

                <div class="form-group row">
                    <label for="password"
                           class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div class="col-md-6">
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
                    <label for="new_password"
                           class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
                    <div class="col-md-6">
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
                           class="col-md-4 col-form-label text-md-right">{{ __('Password confirmation') }}</label>
                    <div class="col-md-6">
                        <input id="new_password_confirmation" type="password" class="form-control"
                               name="new_password_confirmation" required>
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
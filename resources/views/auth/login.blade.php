@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 py-4">
                <div class="card">
                    <div class="card-header">{{ __('app.Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('app.Login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">{{ __('app.E-Mail Address') }}</label>
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                       value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('app.Password') }}</label>
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('app.Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                {{ __('app.Login') }}
                            </button>
                            <div class="py-3">
                                <a href="{{ route('password.request') }}">
                                    {{ __('app.Forgot Your Password?') }}
                                </a>
                            </div>
                        </form>
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg btn-block">
                            {{ __('app.Register') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

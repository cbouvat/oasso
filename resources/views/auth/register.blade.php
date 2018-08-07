@extends('layouts.emptyLayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
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
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>


                            <H3> Infos persos</H3>

                            <div class="form-group row">
                                <label for="gender"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                                <div class="col-md-6">
                                    <select id="gender" name="gender" class="custom-select">
                                        <option selected disabled>Civilité</option>
                                        <option value=1>Monsieur</option>
                                        <option value=2>Madame</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>
                                <div class="col-md-6">
                                    <input id="lastname" type="text"
                                           class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                           name="lastname" value="{{ old('lastname') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="firstname"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>
                                <div class="col-md-6">
                                    <input id="firstname" type="text"
                                           class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                           name="firstname" value="{{ old('firstname') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birthdate"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Birthdate') }}</label>
                                <div class="col-md-6">
                                    <input id="birthdate" type="date"
                                           class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}"
                                           name="birthdate" value="{{ old('birthdate') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address_line1"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Address_line1') }}</label>
                                <div class="col-md-6">
                                    <input id="address_line1" type="text"
                                           class="form-control{{ $errors->has('address_line1') ? ' is-invalid' : '' }}"
                                           name="address_line1" value="{{ old('address_line1') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address_line_2"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Address_line_2') }}</label>
                                <div class="col-md-6">
                                    <input id="address_line_2" type="text"
                                           class="form-control"
                                           name="address_line_2" value="{{ old('address_line_2') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zip_code"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Zip code') }}</label>
                                <div class="col-md-6">
                                    <input id="zip_code" type="text"
                                           class="form-control {{ $errors->has('zip_code') ? ' is-invalid' : '' }}"
                                           name="zip_code" value="{{ old('zip_code') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                                <div class="col-md-6">
                                    <input id="city" type="text"
                                           class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                           name="city" value="{{ old('city') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_number_1"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Phone_number_1') }}</label>
                                <div class="col-md-6">
                                    <input id="phone_number_1" type="text"
                                           class="form-control"
                                           name="phone_number_1" value="{{ old('phone_number_1') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_number_2"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Phone_number_2') }}</label>
                                <div class="col-md-6">
                                    <input id="phone_number_2" type="text"
                                           class="form-control"
                                           name="phone_number_2" value="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="newspaper"
                                       class="col-md-4 col-form-label text-md-right">{{ __('NewsPaper') }}</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="newspaper"
                                           id="newspaper1" value="1" checked>
                                    <label class="form-check-label" for="newspaper">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="newspaper"
                                           id="newspaper2" value="0">
                                    <label class="form-check-label" for="newspaper">
                                        Non
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="newsletter"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Newsletter') }}</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="newsletter"
                                           id="newsletter1" value="1" checked>
                                    <label class="form-check-label" for="newsletter1">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="newsletter"
                                           id="newsletter2" value="0">
                                    <label class="form-check-label" for="newsletter2">
                                        Non
                                    </label>
                                </div>
                            </div>

                            <h3>Votre conjoint (si Famille)</h3>
                            <div class="form-group row">
                                <label for="gender_joint"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Gender Partner') }}</label>
                                <div class="col-md-6">
                                    <select id="gender_joint" name="gender_joint" class="custom-select">
                                        <option value=1>Monsieur</option>
                                        <option value=2>Madame</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname_joint "
                                       class="col-md-4 col-form-label text-md-right">{{ __('Partner Lastname') }}</label>
                                <div class="col-md-6">
                                    <input id="lastname_joint" type="text"
                                           class="form-control"
                                           name="lastname_joint" value="{{ old('lastname_joint') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="firstname_joint"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Partner Firstname') }}</label>
                                <div class="col-md-6">
                                    <input id="firstname_joint" type="text"
                                           class="form-control"
                                           name="firstname_joint" value="{{ old('firstname_joint') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Partner E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email_joint" type="email"
                                           class="form-control"
                                           name="email_joint" value="{{ old('email_joint') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birthdate_joint"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Partner Birthday') }}</label>
                                <div class="col-md-6">
                                    <input id="birthdate_joint" type="date"
                                           class="form-control"
                                           name="birthdate_joint" value="{{ old('birthdate_joint') }}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

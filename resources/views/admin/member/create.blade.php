@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <form action="{{ route('admin.member.store') }}" method="post">
            @csrf

            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
            <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                <div class="col-md-6">
                    <select id="gender" name="gender" value="{{ old('gender') }}" class="form-control">
                        <option>{{ __('Civility') }}</option>
                        <option value="1">{{ __('Male') }}</option>
                        <option value="2">{{ __('Female') }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                <div class="col-md-6">
                    <input id="lastname" type="text" name="lastname" value="{{ old('lastname') }}" class="form-control">
                </div>
            </div>


            <div class="form-group row">
                <label for="firstname"
                       class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                <div class="col-md-6">
                    <input id="firstname" type="text" name="firstname" value="{{ old('firstname') }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="birthdate"
                       class="col-md-4 col-form-label text-md-right">{{ __('Birthdate') }}</label>

                <div class="col-md-6">
                    <input id="birthdate" type="date" name="birthdate" value="{{ old('birthdate') }}" class="form-control">
                    {{--Attention le type de champ requis ne fonctionne pas sur firefox --}}
                </div>
            </div>

            <div class="form-group row">
                <label for="password"
                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" name="password" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm"
                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" name="password_confirmation" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="address_line1"
                       class="col-md-4 col-form-label text-md-right">{{ __('Address line 1') }}</label>
                <div class="col-md-6">
                    <input id="address_line1" type="text" name="address_line1" value="{{ old('address_line1') }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="address_line_2"
                       class="col-md-4 col-form-label text-md-right">{{ __('Address line 2') }}</label>
                <div class="col-md-6">
                    <input id="address_line_2" type="text" name="address_line1" value="{{ old('address_line2') }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="zip_code"
                       class="col-md-4 col-form-label text-md-right">{{ __('Zip code') }}</label>
                <div class="col-md-6">
                    <input id="zip_code" type="text" name="zip_code" value="{{ old('zip_code') }}" class="form-control">
                </div>
            </div>


            <div class="form-group row">
                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                <div class="col-md-6">
                    <input id="city" type="text" name="city" value="{{ old('city') }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="email"
                       class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                <div class="col-md-6">
                    <input id="email" type="text" name="email" value="{{ old('email') }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="gender_joint"
                       class="col-md-4 col-form-label text-md-right">{{ __('Gender joint') }}</label>
                <div class="col-md-6">
                    <select id="gender_joint" name="gender_joint" value="{{ old('gender_joint') }}" class="form-control">
                        <option>{{ __('Joint civility') }}</option>
                        <option value="1">{{ __('Male') }}</option>
                        <option value="2">{{ __('Female') }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="lastname_joint"
                       class="col-md-4 col-form-label text-md-right">{{ __('Lastname joint') }}</label>
                <div class="col-md-6">
                    <input id="lastname_joint" type="text" name="lastname_joint" value="{{ old('lastname_joint') }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="firstname_joint"
                       class="col-md-4 col-form-label text-md-right">{{ __('Firstname joint') }}</label>
                <div class="col-md-6">
                    <input id="firstname_joint" type="text" name="firstname_joint" value="{{ old('firstname_joint') }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="birthdate_joint"
                       class="col-md-4 col-form-label text-md-right">{{ __('Birthdate joint') }}</label>
                <div class="col-md-6">
                    <input id="birthdate_joint" type="date" name="birthdate_joint" value="{{ old('birthdate_joint') }}" class="form-control">
                    {{--Attention le type de champ requis ne fonctionne pas sur firefox --}}
                </div>
            </div>

            <div class="form-group row">
                <label for="email_joint"
                       class="col-md-4 col-form-label text-md-right">{{ __('Email joint') }}</label>
                <div class="col-md-6">
                    <input id="email_joint" type="email" name="email_joint" value="{{ old('email_joint') }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="phone_number_1"
                       class="col-md-4 col-form-label text-md-right">{{ __('Phone number 1') }}</label>
                <div class="col-md-6">
                    <input id="phone_number_1" type="text" name="phone_number_1" value="{{ old('phone_number_1') }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="phone_number_2"
                       class="col-md-4 col-form-label text-md-right">{{ __('Phone number 2') }}</label>
                <div class="col-md-6">
                    <input id="phone_number_2" type="text" name="phone_number_2" value="{{ old('phone_number_2') }}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox" name="volonteer" id="volonteer" value="1" class="form-control">
                            <label class="form-check-label" for="volonteer">
                                {{ __('Volonteer') }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <label for="details_volonteer"
                       class="col-md-4 col-form-label text-md-right">{{ __('Details volonteer') }}</label>
                <div class="col-md-6">
                    <input id="details_volonteer" type="text" name="email" value="{{ old('details_volonteer') }}" class="form-control">
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="delivery" id="delivery" value="1">
                            <label class="form-check-label" for="delivery">
                                {{ __('Delivery') }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="newspaper" id="newspaper" value="1">
                            <label class="form-check-label" for="newspaper">
                                {{ __('Newspaper') }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox" name="newsletter" id="newsletter">
                            <label class="form-check-label" for="newsletter">
                                {{ __('Newsletter') }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox" name="mailing" id="mailing" value="1">
                            <label class="form-check-label" for="mailing">
                                {{ __('Mailing') }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="comment"
                       class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>
                <div class="col-md-6">
                    <input id="comment" type="text" name="comment" value="{{ old('comment') }}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox" name="mailing" id="alert" value="1">
                            <label class="form-check-label" for="alert">
                                {{ __('Alert') }}
                            </label>
                        </div>
                    </div>
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
@endsection
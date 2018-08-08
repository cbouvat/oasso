@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <form action="{{ route('admin.member.store') }}" method="post">
            @csrf

            <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                <div class="col-md-6">
                    <select id="gender" name="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}">
                        <option>{{ __('Civility') }}</option>
                        <option value="1" @if(old('gender') ==1)selected @endif> {{ __('Male') }}</option>
                        <option value="2" @if(old('gender') ==2)selected @endif>{{ __('Female') }}</option>
                    </select>
                    @if ($errors->has('gender'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>
                <div class="col-md-6">
                    <input id="lastname" type="text" name="lastname" value="{{ old('lastname') }}" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}">
                    @if ($errors->has('lastname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                    @endif

                </div>
            </div>

            <div class="form-group row">
                <label for="firstname"
                       class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>
                <div class="col-md-6">
                    <input id="firstname" type="text" name="firstname" value="{{ old('firstname') }}"
                           class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}">
                    @if ($errors->has('firstname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('firstname') }}</strong>
                        </span>
                    @endif

                </div>
            </div>

            <div class="form-group row">
                <label for="birthdate"
                       class="col-md-4 col-form-label text-md-right">{{ __('Birthdate') }}</label>
                <div class="col-md-6">
                    <input id="birthdate" type="date" name="birthdate" value="{{ old('birthdate') }}"
                           class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}">
                    {{--Attention le type de champ requis ne fonctionne pas sur firefox --}}
                    @if ($errors->has('birthdate'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('birthdate') }}</strong>
                        </span>
                    @endif
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
                    <input id="address_line1" type="text" name="address_line1" value="{{ old('address_line1') }}"
                           class="form-control{{ $errors->has('address_line1') ? ' is-invalid' : '' }}">
                    @if ($errors->has('address_line1'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address_line1') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="address_line2"
                       class="col-md-4 col-form-label text-md-right">{{ __('Address line 2') }}</label>
                <div class="col-md-6">
                    <input id="address_line2" type="text" name="address_line2" value="{{ old('address_line2') }}"
                           class="form-control{{ $errors->has('address_line2') ? ' is-invalid' : '' }}">
                    @if ($errors->has('address_line2'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address_line2') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="zipcode"
                       class="col-md-4 col-form-label text-md-right">{{ __('Zip code') }}</label>
                <div class="col-md-6">
                    <input id="zipcode" type="text" name="zipcode" value="{{ old('zipcode') }}" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}">
                    @if ($errors->has('zipcode'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('zipcode') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                <div class="col-md-6">
                    <input id="city" type="text" name="city" value="{{ old('city') }}" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}">
                    @if ($errors->has('city'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email"
                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('email') }}</strong>
                       </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="gender_joint"
                       class="col-md-4 col-form-label text-md-right">{{ __('Partner gender') }}</label>
                <div class="col-md-6">
                    <select id="gender_joint" name="gender_joint" class="form-control">
                        <option value="0" @if(old('gender_joint') ==0)selected @endif> {{ __('Partner gender') }}</option>
                        <option value="1" @if(old('gender_joint') ==1)selected @endif> {{ __('Male') }}</option>
                        <option value="2" @if(old('gender_joint') ==2)selected @endif>{{ __('Female') }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="lastname_joint"
                       class="col-md-4 col-form-label text-md-right">{{ __('Lastname joint') }}</label>
                <div class="col-md-6">
                    <input id="lastname_joint" type="text" name="lastname_joint" value="{{ old('lastname_joint') }}"
                           class="form-control{{ $errors->has('lastname_joint') ? ' is-invalid' : '' }}">
                    @if ($errors->has('lastname_joint'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lastname_joint') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="firstname_joint"
                       class="col-md-4 col-form-label text-md-right">{{ __('Firstname joint') }}</label>
                <div class="col-md-6">
                    <input id="firstname_joint" type="text" name="firstname_joint" value="{{ old('firstname_joint') }}"
                           class="form-control{{ $errors->has('firstname_joint') ? ' is-invalid' : '' }}">
                    @if ($errors->has('firstname_joint'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('firstname_joint') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="birthdate_joint"
                       class="col-md-4 col-form-label text-md-right">{{ __('Birthdate joint') }}</label>
                <div class="col-md-6">
                    <input id="birthdate_joint" type="date" name="birthdate_joint" value="{{ old('birthdate_joint') }}"
                           class="form-control{{ $errors->has('birthdate_joint') ? ' is-invalid' : '' }}">
                    {{--Attention le type de champ requis ne fonctionne pas sur firefox --}}
                    @if ($errors->has('birthdate_joint'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('birthdate_joint') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email_joint"
                       class="col-md-4 col-form-label text-md-right">{{ __('Email joint') }}</label>
                <div class="col-md-6">
                    <input id="email_joint" type="email" name="email_joint" value="{{ old('email_joint') }}"
                           class="form-control{{ $errors->has('email_joint') ? ' is-invalid' : '' }}">
                    @if ($errors->has('email_joint'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email_joint') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="phone_number_1"
                       class="col-md-4 col-form-label text-md-right">{{ __('Phone number 1') }}</label>
                <div class="col-md-6">
                    <input id="phone_number_1" type="text" name="phone_number_1" value="{{ old('phone_number_1') }}"
                           class="form-control{{ $errors->has('phone_number_1') ? ' is-invalid' : '' }}">
                    @if ($errors->has('phone_number_1'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone_number_1') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="phone_number_2"
                       class="col-md-4 col-form-label text-md-right">{{ __('Phone number 2') }}</label>
                <div class="col-md-6">
                    <input id="phone_number_2" type="text" name="phone_number_2" value="{{ old('phone_number_2') }}"
                           class="form-control{{ $errors->has('phone_number_2') ? ' is-invalid' : '' }}">
                    @if ($errors->has('phone_number_2'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone_number_2') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox" name="volonteer" id="volonteer" value="1" class="form-control"
                                   @if(old('volonteer') ==1)checked @endif>
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
                    <input id="details_volonteer" type="text" name="details_volonteer" value="{{ old('details_volonteer') }}"
                           class="form-control{{ $errors->has('details_volonteer') ? ' is-invalid' : '' }}">
                    @if ($errors->has('details_volonteer'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('details_volonteer') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="delivery" id="delivery" value="1"
                                   @if(old('delivery') ==1)checked @endif>
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
                            <input class="form-check-input" type="checkbox" name="newspaper" id="newspaper" value="1"
                                   @if(old('newspaper') ==1)checked @endif>
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
                                   type="checkbox" name="newsletter" id="newsletter" value="1"
                                   @if(old('newsletter') ==1)checked @endif>
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
                                   type="checkbox" name="mailing" id="mailing" value="1"
                                   @if(old('mailing') ==1)checked @endif>
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
                    <input id="comment" type="text" name="comment" value="{{ old('comment') }}" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}">
                    @if ($errors->has('comment'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox" name="alert" id="alert" value="1"
                                   @if(old('alert') ==1)checked @endif>
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
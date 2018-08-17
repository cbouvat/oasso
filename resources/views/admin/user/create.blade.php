@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>{{ __('app.Add member') }}</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('app.Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('app.Add member') }}</li>
        </ol>
    </nav>

    <form action="{{ route('admin.user.store') }}" method="post">
        @csrf
        <h4>{{__('app.Personal Informations')}}</h4>
        <div class="form-group row">
            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('app.Gender') }}</label>
            <div class="col-md-8">
                <select id="gender" name="gender"
                        class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}">
                    <option>{{ __('app.Choose gender') }}</option>
                    <option value="1" @if(old('gender') ==1)selected @endif> {{ __('app.Mr') }}</option>
                    <option value="2" @if(old('gender') ==2)selected @endif>{{ __('app.Ms') }}</option>
                </select>
                @if ($errors->has('gender'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('app.Lastname') }}</label>
            <div class="col-md-8">
                <input id="lastname" type="text" name="lastname" value="{{ old('lastname') }}"
                       class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}">
                @if ($errors->has('lastname'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                @endif

            </div>
        </div>

        <div class="form-group row">
            <label for="firstname"
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Firstname') }}</label>
            <div class="col-md-8">
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
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Birthdate') }}</label>
            <div class="col-md-8">
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
            <label for="address_line1"
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Address_line1') }}</label>
            <div class="col-md-8">
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
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Address_line2') }}</label>
            <div class="col-md-8">
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
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Zipcode') }}</label>
            <div class="col-md-8">
                <input id="zipcode" type="text" name="zipcode" value="{{ old('zipcode') }}"
                       class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}">
                @if ($errors->has('zipcode'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('zipcode') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('app.City') }}</label>
            <div class="col-md-8">
                <input id="city" type="text" name="city" value="{{ old('city') }}"
                       class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}">
                @if ($errors->has('city'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="email"
                   class="col-md-4 col-form-label text-md-right">{{ __('app.E-Mail Address') }}</label>
            <div class="col-md-8">
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

        <div id="pwdByEmail" class="form-group row" style="display: none">
            <label for="pwdByEmail"
                   class="col-md-4 col-form-label text-md-right"
                   style="color: #0294c1;">{{ __('app.Envoyer le mot de passe par email') }}</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="sendPwdByEmail" id="sendPwdByEmail" value="1"
                       @if(old('sendPwdByEmail') == 1) checked @endif>
            </div>
        </div>

        <div class="form-group row">
            <label for="phone_1"
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Phone 1') }}</label>
            <div class="col-md-8">
                <input id="phone_1" type="text" name="phone_1" value="{{ old('phone_1') }}"
                       class="form-control{{ $errors->has('phone_1') ? ' is-invalid' : '' }}">
                @if ($errors->has('phone_1'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone_1') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="phone_2"
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Phone 2') }}</label>
            <div class="col-md-8">
                <input id="phone_2" type="text" name="phone_2" value="{{ old('phone_2') }}"
                       class="form-control{{ $errors->has('phone_2') ? ' is-invalid' : '' }}">
                @if ($errors->has('phone_2'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone_2') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="volonteer"
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Volonteer') }}</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="volonteer" id="volonteer" value="1"
                       @if(old('volonteer') == 1) checked @endif>
            </div>
        </div>

        <div class="form-group row">
            <label for="details_volonteer"
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Details volonteer') }}</label>
            <div class="col-md-8">
                <input id="details_volonteer" type="text" name="details_volonteer"
                       value="{{ old('details_volonteer') }}"
                       class="form-control{{ $errors->has('details_volonteer') ? ' is-invalid' : '' }}">
                @if ($errors->has('details_volonteer'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('details_volonteer') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="delivery"
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Delivery') }}</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="delivery" id="delivery" value="1"
                       @if(old('delivery') == 1) checked @endif>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-8 offset-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="newsletter"
                           id="newsletter"
                           value="1"
                           @if(old('newsletter') == 1) checked @endif>
                    <label for="newsletter"
                           class="col-form-label text-md-right">{{ __('app.Subscribe to the newsletter') }}</label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-8 offset-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="newspaper" id="newspaper"
                           value="1"
                           @if(old('newspaper') == 1) checked @endif>
                    <label for="newspaper"
                           class="col-form-label text-md-right">{{ __('app.Subscribe to the newspaper') }}</label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="comment"
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Comment') }}</label>
            <div class="col-md-6">
                <input id="comment" type="text" name="comment" value="{{ old('comment') }}"
                       class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}">
                @if ($errors->has('comment'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="alert"
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Alert') }}</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="alert" id="alert" value="1"
                       @if(old('alert') == 1) checked @endif>
            </div>
        </div>

        <h4>{{ __('app.Partner informations (if family)') }}</h4>
        <div class="form-group row">
            <label for="gender_joint"
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Partner Gender') }}</label>
            <div class="col-md-6">
                <select id="gender_joint" name="gender_joint" class="form-control">
                    <option value="0"
                            @if(old('gender_joint') ==0)selected @endif> {{ __('app.Partner Gender') }}</option>
                    <option value="1" @if(old('gender_joint') ==1)selected @endif> {{ __('app.Mr') }}</option>
                    <option value="2" @if(old('gender_joint') ==2)selected @endif>{{ __('app.Ms') }}</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="lastname_joint"
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Partner Lastname') }}</label>
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
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Partner Firstname') }}</label>
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
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Partner Birthdate') }}</label>
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
                   class="col-md-4 col-form-label text-md-right">{{ __('app.Partner E-mail Address') }}</label>
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

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('app.Register') }}
                </button>
            </div>
        </div>
    </form>
    </div>

    <script>

        $('#email').on('blur keypress', function () {
            if ($(this).val()) {
                $('#pwdByEmail').css('display', 'block');
            } else {
                $('#pwdByEmail').css('display', 'none');
            }
        })

    </script>
@endsection

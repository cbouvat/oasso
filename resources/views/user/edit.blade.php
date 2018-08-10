@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <form action="{{ URL::route('user.update', ['user'=> $user]) }}" method="post">
                    @csrf
                    {{--@method('PUT')--}}

                    {{--@foreach ($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                    {{--@endforeach--}}

                    <div class="card bg-light m-5 pb-5 pl-5 pr-5 pt-3">

                        <div class="card-header mt-1 mb-5 font-weight-bold border"><h4 class="mb-0">Mes Infos</h4></div>

                        <div class="form-group">
                            <label for="gender">Civilité</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="1" @if($user->gender == 1) selected @endif>{{ __('Mr') }}</option>
                                <option value="0" @if($user->gender == 0) selected @endif>{{ __('Ms') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="lastname">Nom</label>
                            <input type="text"
                                   class="form-control {{$errors->has('lastname') ? 'is-invalid':''}}"
                                   name="lastname"
                                   id="lastname"
                                   value="{{ $user->lastname }}">

                            @if ($errors->has('lastname'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="firstname">Prénom</label>
                            <input type="text" name="firstname"
                                   class="form-control {{$errors->has('firstname') ? 'is-invalid':''}}" id="firstname"
                                   value="{{ $user->firstname }}">
                            @if ($errors->has('firstname'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">Adresse Email</label>
                            <input type="email"
                                   name="email"
                                   id="email"
                                   class="form-control {{$errors->has('email') ? 'is-invalid':''}}"
                                   value="{{ $user->email }}">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="birthdate">Date de naissance</label>
                            <input type="date"
                                   name="birthdate"
                                   class="form-control {{$errors->has('birthdate') ? 'is-invalid':''}}"
                                   id="birthdate"
                                   value="{{ $user->birthdate }}">

                            @if ($errors->has('birthdate'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="address_line1">Adresse</label>
                            <input type="text" name="address_line1"
                                   class="form-control {{$errors->has('address_line1') ? 'is-invalid':''}}"
                                   id="address_line1"
                                   value="{{ $user->address_line1}}">

                            @if ($errors->has('address_line1'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_line1') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="address_line2">Adresse 2</label>
                            <input type="text"
                                   name="address_line2"
                                   class="form-control {{$errors->has('address_line2') ? 'is-invalid':''}}"
                                   id="address_line2"
                                   value="{{ $user->address_line2}}">

                            @if ($errors->has('address_line2'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_line2') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="city">Ville</label>
                            <input type="text"
                                   name="city"
                                   class="form-control {{$errors->has('city') ? 'is-invalid':''}}"
                                   id="city"
                                   value="{{ $user->city}}">

                            @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="zipcode">Code Postal</label>
                            <input type="text"
                                   name="zipcode"
                                   class="form-control {{$errors->has('zipcode') ? 'is-invalid':''}}"
                                   id="zipcode"
                                   value="{{ old('zipcode') ? old('zipcode')  : $user->zipcode}}">

                            @if ($errors->has('zipcode'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="phone_number_1">Téléphone 1</label>
                            <input type="text"
                                   name="phone_number_1"
                                   class="form-control {{$errors->has('phone_number_1') ? 'is-invalid':''}}"
                                   id="phone_number_1"
                                   value="{{ $user->phone_number_1}}">

                            @if ($errors->has('phone_number_1'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number_1') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="phone_number_2">Téléphone 2</label>
                            <input type="text"
                                   name="phone_number_2"
                                   class="form-control {{$errors->has('phone_number_2') ? 'is-invalid':''}}"
                                   id="phone_number_2"
                                   value="{{ $user->phone_number_2}}">

                            @if ($errors->has('phone_number_2'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number_2') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group form-check col-6">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="newspaper"
                                   id="newspaper" {{$user->newspaper == 1 ? "checked" : ""}}
                                   value="1"
                            >
                            <label class="form-check-label" for="newspaper">Newspaper</label>

                        </div>

                        <div class="form-group form-check col-6">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="newsletter"
                                   id="newsletter"{{$user->newsletter == 1 ? "checked" : ""}}
                                   value="1"
                            >
                            <label class="form-check-label" for="newsletter">Newsletter</label>
                        </div>


                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Edit') }}</button>
                        </div>

                    </div>


                    <div class="card bg-light m-5 pb-5 pl-5 pr-5 pt-3">
                        <div class="card-header mt-1 mb-5 font-weight-bold border"><h4 class="mb-0">Infos Conjoint</h4>
                        </div>

                        <div class="form-group">
                            <label for="gender_joint">Civilité conjoint</label>
                            <select class="form-control" name="gender_joint" id="gender_joint">
                                <option value="1" @if($user->gender_joint == 1) selected @endif>{{ __('Mr') }}</option>
                                <option value="0" @if($user->gender_joint == 0) selected @endif>{{ __('Ms') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="lastname_joint">Nom</label>
                            <input type="text"
                                   name="lastname_joint"
                                   class="form-control {{$errors->has('lastname_joint') ? 'is-invalid' : ''}}"
                                   id="lastname_joint"
                                   value="{{ $user->lastname_joint }}">
                            @if($errors->has('lastname_joint'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname_joint') }}</strong>
                                </span>
                            @endif

                        </div>


                        <div class="form-group">
                            <label for="firstname_joint">Prénom</label>
                            <input type="text"
                                   name="firstname_joint"
                                   class="form-control {{$errors->has('firstname_joint') ? 'is-invalid' : ''}}"
                                   id="firstname_joint"
                                   value="{{ $user->firstname_joint }}">

                            @if($errors->has('firstname_joint'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname_joint') }}</strong>
                                </span>
                            @endif

                        </div>


                        <div class="form-group">
                            <label for="birthdate_joint">Date de naissance</label>
                            <input type="date"
                                   name="birthdate_joint"
                                   class="form-control  {{$errors->has('birthdate_joint') ? 'is-invalid' : ''}}"
                                   id="birthdate_joint"
                                   value="{{ $user->birthdate_joint }}">

                            @if($errors->has('birthdate_joint'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate_joint') }}</strong>
                                </span>
                            @endif

                        </div>


                        <div class="form-group">
                            <label for="email_joint">Email conjoint</label>
                            <input type="email"
                                   name="email_joint"
                                   class="form-control {{$errors->has('email_joint') ? 'is-invalid' : ''}}"
                                   id="email_joint"
                                   value="{{ $user->email_joint}}">

                            @if($errors->has('birthdate_joint'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate_joint') }}</strong>
                                </span>
                            @endif

                        </div>


                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Edit') }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>



@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <form action="{{ URL::route('user.update') }}" method="post">
                    @csrf
                    {{--@method('PUT')--}}

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                    <div class="card bg-light m-5 pb-5 pl-5 pr-5 pt-3">

                        <div class="card-header mt-1 mb-5 font-weight-bold"><h4>Mes Infos</h4></div>

                        <div class="form-group">
                            <label for="gender">Civilité</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="0" @if($user->gender == 0) selected @endif>{{ __('Mr') }}</option>
                                <option value="1" @if($user->gender == 1) selected @endif>{{ __('Ms') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="firstname">Prénom</label>
                            <input type="text" name="firstname" class="form-control" id="firstname"
                                   value="{{ $user->firstname }}">
                        </div>

                        <div class="form-group">
                            <label for="lastname">Nom</label>
                            <input type="text" name="lastname" class="form-control" id="lastname"
                                   value="{{ $user->lastname }}">
                        </div>


                        <div class="form-group">
                            <label for="email">Adresse Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="birthdate">Date de naissance</label>
                            <input type="date" name="birthdate" class="form-control" id="birthdate"
                                   value="{{ $user->birthdate }}">
                        </div>


                        <div class="form-group">
                            <label for="address_line1">Adresse</label>
                            <input type="text" name="address_line1" class="form-control" id="address_line1"
                                   value="{{ $user->address_line1}}">
                        </div>


                        <div class="form-group">
                            <label for="address_line2">Complément d'adresse</label>
                            <input type="text" name="address_line2" class="form-control" id="address_line2"
                                   value="{{ $user->address_line2}}">
                        </div>


                        <div class="form-group">
                            <label for="city">Ville</label>
                            <input type="text" name="city" class="form-control" id="city" value="{{ $user->city}}">
                        </div>


                        <div class="form-group">
                            <label for="zipcode">Code Postal</label>
                            <input type="text" name="zipcode" class="form-control" id="zipcode"
                                   value="{{ $user->zipcode}}">
                        </div>


                        <div class="form-group">
                            <label for="phone_number_1">Téléphone 1</label>
                            <input type="text" name="phone_number_1" class="form-control" id="phone_number_1"
                                   value="{{ $user->phone_number_1}}">
                        </div>


                        <div class="form-group">
                            <label for="phone_number_2">Téléphone 2</label>
                            <input type="text" name="phone_number_2" class="form-control" id="phone_number_2"
                                   value="{{ $user->phone_number_2}}">
                        </div>


                        <div class="form-group form-check col-6">
                            <input class="form-check-input" type="checkbox" name="newspaper" id="newspaper" {{$user->newspaper == "1" ? "checked" : ""}}>
                            <label class="form-check-label" for="newspaper">Newspaper</label>

                        </div>

                        <div class="form-group form-check col-6">
                            <input class="form-check-input" type="checkbox" name="newsletter" id="newsletter"{{$user->newsletter == "1" ? "checked" : ""}}>
                            <label class="form-check-label" for="newsletter">Newsletter</label>
                        </div>


                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Edit') }}</button>
                        </div>

                    </div>


                    <div class="card bg-light m-5 pb-5 pl-5 pr-5 pt-3">
                        <div class="card-header mt-1 mb-5 font-weight-bold"><h4>Infos Conjoint</h4></div>

                        <div class="form-group">
                            <label for="gender_joint">Civilité conjoint</label>
                            <select class="form-control" name="gender_joint" id="gender_joint">
                                <option value="0" @if($user->gender_joint == 0) selected @endif>{{ __('Mr') }}</option>
                                <option value="1" @if($user->gender_joint == 1) selected @endif>{{ __('Ms') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="lastname_joint">Nom</label>
                            <input type="text" name="lastname_joint" class="form-control" id="lastname_joint"
                                   value="{{ $user->lastname_joint }}">
                        </div>


                        <div class="form-group">
                            <label for="firstname_joint">Prénom</label>
                            <input type="text" name="firstname_joint" class="form-control" id="firstname_joint"
                                   value="{{ $user->firstname_joint }}">
                        </div>


                        <div class="form-group">
                            <label for="birthdate_joint">Date de naissance</label>
                            <input type="date" name="birthdate_joint" class="form-control" id="birthdate_joint"
                                   value="{{ $user->birthdate_joint }}">
                        </div>


                        <div class="form-group">
                            <label for="email_joint">Email conjoint</label>
                            <input type="email" name="email_joint" class="form-control" id="email_joint"
                                   value="{{ $user->email_joint}}">
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
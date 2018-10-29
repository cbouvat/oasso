@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Membre {{ $user->id }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.user.gift.create', $user) }}" class="btn btn-success mr-2">Ajouter un Don</a>
            <a href="{{ route('admin.subscription.create') }}" class="btn btn-success mr-2">Ajouter une
                Adhésion</a>
            <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-primary mr-2">Modifier</a>
            <a href="{{route('admin.user.delete', ['user' => $user])}}" class="btn btn-danger">Supprimer</a>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Membres</a></li>
            <li class="breadcrumb-item">Membre {{ $user->id }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-sm-6">
            <form action="{{ route('admin.user.update', $user) }}" method="post">
                @csrf
                <h2>{{ $user->firstname }} {{ $user->lastname }}</h2>

                <div class="form-group row">
                    <label class="col-sm-4" for="gender">Civilité</label>
                    <div class="col-sm-6">
                        <select class="custom-select" name="gender" id="gender">
                            <option value="0"
                                    @if($user->gender == 0) selected @endif>{{ __('Gender') }}</option>
                            <option value="1"
                                    @if($user->gender == 1) selected @endif>{{ __('Mr') }}</option>
                            <option value="2"
                                    @if($user->gender == 2) selected @endif>{{ __('Ms') }}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4" for="lastname">Nom</label>
                    <div class="col-sm-6">

                        <input type="text"
                               class="form-control {{$errors->has('lastname') ? 'is-invalid':''}}"
                               name="lastname"
                               id="lastname"
                               value="{{ old('lastname') ? old('lastname')  : $user->lastname}}">

                        @if ($errors->has('lastname'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4" for="firstname">Prénom</label>
                    <div class="col-sm-6">

                        <input type="text" name="firstname"
                               class="form-control {{$errors->has('firstname') ? 'is-invalid':''}}"
                               id="firstname"
                               value="{{ old('firstname') ? old('firstname')  : $user->firstname}}">

                        @if ($errors->has('firstname'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4" for="email">Adresse Email</label>
                    <div class="col-sm-6">

                        <input type="email"
                               name="email"
                               id="email"
                               class="form-control {{$errors->has('email') ? 'is-invalid':''}}"
                               value="{{ old('email') ? old('email')  : $user->email}}">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4" for="birthdate">Date de naissance</label>
                    <div class="col-sm-6">

                        <input type="date"
                               name="birthdate"
                               class="form-control {{$errors->has('birthdate') ? 'is-invalid':''}}"
                               id="birthdate"
                               value="{{ old('birthdate') ? old('birthdate')  : $user->birthdate}}">

                        @if ($errors->has('birthdate'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-4" for="address_line1">Adresse</label>
                    <div class="col-sm-6">

                        <input type="text" name="address_line1"
                               class="form-control {{$errors->has('address_line1') ? 'is-invalid':''}}"
                               id="address_line1"
                               value="{{ old('address_line1') ? old('address_line1')  : $user->address_line1}}">

                        @if ($errors->has('address_line1'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_line1') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-4" for="address_line2">Adresse 2</label>
                    <div class="col-sm-6">

                        <input type="text"
                               name="address_line2"
                               class="form-control {{$errors->has('address_line2') ? 'is-invalid':''}}"
                               id="address_line2"
                               value="{{ old('address_line2') ? old('address_line2')  : $user->address_line2}}">

                        @if ($errors->has('address_line2'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_line2') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-4" for="city">Ville</label>
                    <div class="col-sm-6">

                        <input type="text"
                               name="city"
                               class="form-control {{$errors->has('city') ? 'is-invalid':''}}"
                               id="city"
                               value="{{ old('city') ? old('city')  : $user->city}}">

                        @if ($errors->has('city'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-4" for="zipcode">Code Postal</label>
                    <div class="col-sm-6">

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
                </div>


                <div class="form-group row">
                    <label class="col-sm-4" for="phone_number_1">Téléphone 1</label>
                    <div class="col-sm-6">

                        <input type="text"
                               name="phone_number_1"
                               class="form-control {{$errors->has('phone_number_1') ? 'is-invalid':''}}"
                               id="phone_number_1"
                               value="{{ old('phone_number_1') ? old('phone_number_1')  : $user->phone_number_1}}">

                        @if ($errors->has('phone_number_1'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number_1') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-4" for="phone_number_2">Téléphone 2</label>
                    <div class="col-sm-6">

                        <input type="text"
                               name="phone_number_2"
                               class="form-control {{$errors->has('phone_number_2') ? 'is-invalid':''}}"
                               id="phone_number_2"
                               value="{{ old('phone_number_2') ? old('phone_number_2')  : $user->phone_number_2}}">

                        @if ($errors->has('phone_number_2'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number_2') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>


                <div class="form-group form-check col-6">
                    <input class="form-check-input"
                           type="checkbox"
                           name="newspaper"
                           id="newspaper" {{$user->newspaper == 1 ? "checked" : ""}}
                           value="1"
                    >
                    <label class="col-sm-4" class="form-check-label" for="newspaper">Newspaper</label>

                </div>

                <div class="form-group form-check col-6">
                    <input class="form-check-input"
                           type="checkbox"
                           name="newsletter"
                           id="newsletter" {{$user->newsletter == 1 ? "checked" : ""}}
                           value="1"
                    >
                    <label class="col-sm-4" class="form-check-label" for="newsletter">Newsletter</label>
                </div>


                <h2>Infos Conjoint
                    <small>(facultatif)</small>
                </h2>
                <div class="form-group row">
                    <label class="col-sm-4" for="gender_joint">Civilité conjoint</label>
                    <div class="col-sm-6">

                        <select class="custom-select" name="gender_joint" id="gender_joint">
                            <option value="0"
                                    @if($user->gender_joint == 0) selected @endif>{{ __('Partner Gender') }}</option>
                            <option value="1"
                                    @if($user->gender_joint == 1) selected @endif>{{ __('Mr') }}</option>
                            <option value="2"
                                    @if($user->gender_joint == 2) selected @endif>{{ __('Ms') }}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4" for="lastname_joint">Nom</label>
                    <div class="col-sm-6">

                        <input type="text"
                               name="lastname_joint"
                               class="form-control {{$errors->has('lastname_joint') ? 'is-invalid' : ''}}"
                               id="lastname_joint"
                               value="{{ old('lastname_joint') ? old('lastname_joint')  : $user->lastname_joint}}">

                        @if($errors->has('lastname_joint'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname_joint') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-4" for="firstname_joint">Prénom</label>
                    <div class="col-sm-6">

                        <input type="text"
                               name="firstname_joint"
                               class="form-control {{$errors->has('firstname_joint') ? 'is-invalid' : ''}}"
                               id="firstname_joint"
                               value="{{ old('firstname_joint') ? old('firstname_joint')  : $user->firstname_joint}}">

                        @if($errors->has('firstname_joint'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname_joint') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-4" for="birthdate_joint">Date de naissance</label>
                    <div class="col-sm-6">

                        <input type="date"
                               name="birthdate_joint"
                               class="form-control  {{$errors->has('birthdate_joint') ? 'is-invalid' : ''}}"
                               id="birthdate_joint"
                               value="{{ old('birthdate_joint') ? old('birthdate_joint')  : $user->birthdate_joint}}">

                        @if($errors->has('birthdate_joint'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate_joint') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-4" for="email_joint">Email conjoint</label>
                    <div class="col-sm-6">

                        <input type="email"
                               name="email_joint"
                               class="form-control {{$errors->has('email_joint') ? 'is-invalid' : ''}}"
                               id="email_joint"
                               value="{{ old('email_joint') ? old('email_joint')  : $user->email_joint}}">

                        @if($errors->has('birthdate_joint'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email_joint') }}</strong>
                                </span>
                        @endif
                    </div>

                </div>


                <div class="col-md-8 offset-md-4">
                    <input type="submit" value="Modifier"
                           class="btn btn-primary">
                </div>
            </form>
        </div>
        <div class="col-sm-6">
            <h2>Adhésions</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Depuis</th>
                    <th>Jusqu'au</th>
                    <th>Montant</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($user->subscriptions)

                    @forelse($user->subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->date_start }}</td>
                            <td>{{ $subscription->date_end }}</td>
                            <td>{{ $subscription->amount }}</td>
                            <td>{{ $subscription->type->name }}</td>
                            <td class="text-right">
                                <a href="{{ route('admin.subscription.edit', $subscription) }}"
                                   class="btn btn-sm btn-outline-primary"><span
                                            data-feather="edit"></span></a>
                                <a class="btn btn-sm btn-outline-danger"
                                   href="{{ route('admin.subscription.delete', $subscription) }}"><span
                                            data-feather="trash"></span> Supprimer</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Aucune adhésion</td>
                        </tr>
                    @endforelse
                @endif
                </tbody>
            </table>


            <h2>Dons</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Montant</th>
                    <th>Methode de paiement</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($user->gifts)
                    @forelse($user->gifts as $gift)
                        <tr>
                            <td>{{ $gift->created_at->format('d/m/Y') }}</td>
                            <td>{{ $gift->amount }}</td>
                            <td>{{ $gift->payment->paymentMethod->name }}</td>
                            <td class="text-right">
                                <a href="{{ route('admin.gift.edit', $gift) }}"
                                   class="btn btn-sm btn-outline-primary"><span
                                            data-feather="edit"></span> Modifier</a>
                                <a class="btn btn-sm btn-outline-danger"
                                   href="{{ route('admin.gift.delete', $gift) }}"><span
                                            data-feather="trash"></span> Supprimer</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Aucun don</td>
                        </tr>
                    @endforelse
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <form action="{{ route('front.user.update') }}" method="post">
                    @csrf
                    @method('PUT')

                    {{--@dd($user)--}}

                    <div class="card bg-light m-5 pb-5 pl-5 pr-5 pt-3">

                        <div class="card-header mt-1 mb-5 font-weight-bold"><h4>Mes Infos</h4></div>

                        <div class="form-group">
                            <label for="FormControlSelect1">Civilité</label>
                            <select class="form-control" id="exampleFormControlSelect1">

                                <option selected disabled>

                                    @if($user->gender == 0)
                                        Monsieur
                                    @elseif($user->gender == 1)
                                        Madame
                                    @else
                                        Selectioner votre sexe
                                    @endif</option>
                                <option>Monsieur</option>
                                <option>Madame</option>

                            </select>
                        </div>


                        <div class="form-group">
                            <label for="InputFirstname">Prénom</label>
                            <input type="text" class="form-control" id="InputFirstname" aria-describedby="emailHelp"
                                   value="{{ $user->firstname }}">
                        </div>


                        <div class="form-group">
                            <label for="InputLastname">Nom</label>
                            <input type="text" class="form-control" id="InputLastname" value="{{ $user->lastname }}">
                        </div>


                        <div class="form-group">
                            <label for="InputEmail">Adresse Email</label>
                            <input type="email" class="form-control" id="InputEmail" value="{{ $user->email }}">
                        </div>


                        <div class="form-group">
                            <label for="inputBirthdate">Date de naissance</label>
                            <input type="date" class="form-control" id="inputBirthdate" value="{{ $user->birthdate }}">
                        </div>


                        <div class="form-group">
                            <label for="InputAddress">Adresse</label>
                            <input type="text" class="form-control" id="InputAddress" value="{{ $user->address_line1}}">
                        </div>


                        <div class="form-group">
                            <label for="InputAddress">Complément d'adresse</label>
                            <input type="text" class="form-control" id="InputAddress" value="{{ $user->address_line2}}">
                        </div>


                        <div class="form-group">
                            <label for="inputCity">Ville</label>
                            <input type="text" class="form-control" id="inputCity" value="{{ $user->city}}">
                        </div>


                        <div class="form-group">
                            <label for="inputZip_code">Code Postal</label>
                            <input type="text" class="form-control" id="inputZip_code" value="{{ $user->zipcode}}">
                        </div>


                        <div class="form-group">
                            <label for="inputPhone_number">Téléphone 1</label>
                            <input type="text" class="form-control" id="inputPhone_number"
                                   value="{{ $user->phone_number_1}}">
                        </div>


                        <div class="form-group">
                            <label for="inputPhone_number">Téléphone 2</label>
                            <input type="text" class="form-control" id="inputPhone_number"
                                   value="{{ $user->phone_number_2}}">
                        </div>


                        <div class="form-check mt-2">
                            <div class="form-group form-check col-6">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Newsletter</label>
                            </div>


                            <div class="form-group form-check col-6">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Journal papier</label>
                            </div>

                        </div>

                        <div class="form-group mt-3">
                            <input type="submit" value="Modifier" class="btn btn-primary btn-lg btn-block">
                        </div>

                    </div>


                    <div class="card bg-light m-5 pb-5 pl-5 pr-5 pt-3">
                        <div class="card-header mt-1 mb-5 font-weight-bold"><h4>Infos Conjoint</h4></div>

                        <div class="form-group">
                            <label for="FormControlSelect1">Civilité conjoint</label>
                            <select class="form-control" id="exampleFormControlSelect1">


                                <option selected disabled>

                                    @if($user->gender_joint == 0)
                                        Monsieur
                                    @elseif($user->gender_joint == 1)
                                        Madame
                                    @else
                                        Selectioner votre sexe
                                    @endif</option>


                                <option>Monsieur</option>
                                <option>Madame</option>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="InputLastnamePartner">Nom</label>
                            <input type="text" class="form-control" id="InputLastnamePartner"
                                   value="{{ $user->lastname_joint }}">
                        </div>


                        <div class="form-group">
                            <label for="InputFirstnamePartner">Prénom</label>
                            <input type="text" class="form-control" id="InputFirstnamePartner"
                                   value="{{ $user->firstname_joint }}">
                        </div>


                        <div class="form-group">
                            <label for="inputBirthdatePartner">Date de naissance</label>
                            <input type="date" class="form-control" id="inputBirthdatePartner"
                                   value="{{ $user->birthdate_joint }}">
                        </div>


                        <div class="form-group">
                            <label for="InputEmailPartner">Email conjoint</label>
                            <input type="email" class="form-control" id="InputEmailPartner"
                                   value="{{ $user->email_joint}}">
                        </div>


                        <div class="form-group mt-3 mb-0">
                            <input type="submit" value="Modifier" class="btn btn-primary btn-lg btn-block">
                        </div>
                    </div>

                    <div class="card m-5 p-5">
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
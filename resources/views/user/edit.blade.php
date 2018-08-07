@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <form action="{{ route('front.user.update') }}" method="post">
                    @method('PUT')
                    @csrf


                    <div class="card bg-light m-5 p-5">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Civilité</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Monsieur</option>
                                <option>Madame</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="InputFirstname">Prénom</label>
                            <input type="text" class="form-control" id="InputFirstname" aria-describedby="emailHelp"
                                   value="">
                        </div>


                        <div class="form-group">
                            <label for="InputLastname">Nom</label>
                            <input type="text" class="form-control" id="InputLastname">
                        </div>


                        <div class="form-group">
                            <label for="InputEmail">Adresse Email</label>
                            <input type="email" class="form-control" id="InputEmail">
                        </div>


                        <div class="form-group">
                            <label for="inputBirthdate">Date de naissance</label>
                            <input type="date" class="form-control" id="inputBirthdate">
                        </div>


                        <div class="form-group">
                            <label for="InputAddress">Adresse</label>
                            <input type="text" class="form-control" id="InputAddress">
                        </div>


                        <div class="form-group">
                            <label for="InputAddress">Complément d'adresse</label>
                            <input type="text" class="form-control" id="InputAddress">
                        </div>


                        <div class="form-group">
                            <label for="inputCity">Ville</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>


                        <div class="form-group">
                            <label for="inputZip_code">Code Postal</label>
                            <input type="text" class="form-control" id="inputZip_code">
                        </div>


                        <div class="form-group">
                            <label for="inputPhone_number">Téléphone 1</label>
                            <input type="text" class="form-control" id="inputPhone_number">
                        </div>


                        <div class="form-group">
                            <label for="inputPhone_number">Téléphone 2</label>
                            <input type="text" class="form-control" id="inputPhone_number">
                        </div>


                        <div class="form-check">
                            <div class="form-group form-check col-6">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Newsletter</label>
                            </div>


                            <div class="form-group form-check col-6">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Journal papier</label>
                            </div>
                        </div>


                    </div>


                    <div class="card bg-light m-5 p-5">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Civilité conjoint</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Monsieur</option>
                                <option>Madame</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="InputLastnamePartner">Nom</label>
                            <input type="text" class="form-control" id="InputLastnamePartner">
                        </div>


                        <div class="form-group">
                            <label for="InputFirstnamePartner">Prénom</label>
                            <input type="text" class="form-control" id="InputFirstnamePartner">
                        </div>


                        <div class="form-group">
                            <label for="inputBirthdatePartner">Date de naissance</label>
                            <input type="date" class="form-control" id="inputBirthdatePartner">
                        </div>


                        <div class="form-group">
                            <label for="InputEmailPartner">Email conjoint</label>
                            <input type="email" class="form-control" id="InputEmailPartner">
                        </div>


                    </div>

                    <div class="card m-5 p-5">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-lg btn-block">Modifier</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
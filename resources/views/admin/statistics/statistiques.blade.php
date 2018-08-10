@extends('layouts.app')

@section('content')
    <div class="mt-5 pt-5">
        <div class="mb-3">
            <h2>Statistiques</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form-row align-items-center">
                    <div class=" col-3">
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>Choisir...</option>
                            <option value="general">Général</option>
                            <option value="subscriptions">Adhésions</option>
                            <option value="cities">Villes</option>
                            <option value="receipts">Recettes</option>
                        </select>
                    </div>
                    <div class="col-1">
                    <label for="daterange1" class="col-3" > Date de début </label>
            </div>

                    <div class=" align-items-center col-3">

                            <input type="date" id="daterange1" value="" class="form-control"/>
                    </div>
                        <label for="daterange2" class="col-3"> Date de fin </label>
                        <div class="col-3">
                            <input type="date" id="daterange2" value="" class="form-control" />
                        </div>
                        <div class="col-1">
                            <button class="btn btn-primary" id="btnGeneralPersonalized" type="submit">Envoyer</button>
                        </div>


                </form>
            </div>
        </div>




    </div>


@endsection




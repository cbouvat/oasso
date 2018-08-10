@extends('layouts.app')

@section('content')
    <div class="mt-5 pt-5">
        <div class="mb-3">
            <h2>Statistiques</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form-row" id="statsForm">
                    <div class=" col-3">
                        <label for="statsType"> Type </label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect statsType">
                            <option selected>Choisir...</option>
                            <option value="general">Général</option>
                            <option value="subscriptions">Adhésions</option>
                            <option value="cities">Villes</option>
                            <option value="receipts">Recettes</option>
                        </select>
                    </div>
                    <div class=" align-items-center col-3">
                        <label for="daterange1"> Date de début </label>
                        <input type="date" id="daterange1" value="" class="form-control"/>
                    </div>
                    <div class="col-3">
                        <label for="daterange2"> Date de fin </label>
                        <input type="date" id="daterange2" value="" class="form-control" />
                    </div>
                    <div class="col-3">
                        <label for="visibilityType"> Visibilité </label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect visibilityType">
                            <option selected>Choisir...</option>
                            <option value="days">Jour</option>
                            <option value="months">Mois</option>
                            <option value="years">Année</option>
                            <option value="personalized">Personnalisé</option>
                        </select>
                    </div>
                    <div class="col-3 mt-4 pt-1">
                        <button class="btn btn-primary" id="btnGeneralPersonalized" onclick="handleForm()" type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
            <div class="col-12">
                <canvas id="myChartGeneral" width="400" height="200"></canvas>
                @push('scripts')
                    <script>
                        function handleForm(){
                            var result = document.getElementById('statsForm').value;
                            console.log('Le résultat est '+ result);
                        }
                    </script>
                @endpush
            </div>
        </div>




    </div>


@endsection




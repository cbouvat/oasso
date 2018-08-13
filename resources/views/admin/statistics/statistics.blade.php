@extends('layouts.app')

@section('content')
    <div class="mt-5 pt-5">
        <div class="mb-3">
            <h2>Statistiques</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form-row" id="formstat">
                    <div class="col-2">
                        <label for="type"> Type </label>
                        <select class="custom-select mr-sm-2" name="type">
                            <option selected disabled>Choisir...</option>
                            <option value="general">Général</option>
                            <option value="subscriptions">Adhésions</option>
                            <option value="cities">Villes</option>
                            <option value="receipts">Recettes</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="daterange1"> Date de début </label>
                        <input type="date" name="date_start" value="" class="form-control"/>
                    </div>
                    <div class="col-3">
                        <label for="daterange2"> Date de fin </label>
                        <input type="date" name="date_end" value="" class="form-control" />
                    </div>
                    <div class="col-2">
                        <label for="range"> Visibilité </label>
                        <select class="custom-select mr-sm-2" name="range">
                            <option selected disabled>Choisir...</option>
                            <option value="days">Jour</option>
                            <option value="months">Mois</option>
                            <option value="years">Année</option>
                        </select>
                    </div>
                    <div class="col-2 mt-4 pt-1">
                        <input class="btn btn-primary" id="btnGeneralPersonalized" type="submit" value="Envoyer">
                    </div>
                </form>
            </div>
            <div class="col-12">
                <canvas id="myChartGeneral" width="400" height="200"></canvas>
                @push('scripts')
                    <script>
                        $('#formstat').on('submit', function(event) {
                            event.preventDefault();
                            var param = $(this).serialize();

                            $.getJSON('/api/stat?' + param, function(data) {
                                var ctx = document.getElementById("myChartGeneral").getContext('2d');
                                var myLineChart = new Chart(ctx, data);
                            });
                        });
                    </script>
                @endpush
            </div>
        </div>
    </div>
@endsection

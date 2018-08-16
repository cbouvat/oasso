@extends('layouts.app')

@section('content')
    <h1>Statistiques</h1>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href={{route('admin.statistics.select', ['option' => 'general'])}}>Général</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href={{route('admin.statistics.select', ['option' => 'subscriptions'])}}>Adhésions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href={{route('admin.statistics.select', ['option' => 'cities'])}}>Villes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href={{route('admin.statistics.select', ['option' => 'receipts'])}}>Recettes</a>
        </li>
    </ul>


    <form class="form-row mt-2" id="formstat">
        <input name="type" value="subscriptions" id="type" hidden>
        <div class="col-3">
            <label for="daterange1"> Date de début </label>
            <input type="date" name="date_start" value="" class="form-control"/>
        </div>
        <div class="col-3">
            <label for="daterange2"> Date de fin </label>
            <input type="date" name="date_end" value="" class="form-control"/>
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

    <canvas id="myChartGeneral" width="400" height="200"></canvas>
    <div id="tabStat">

    </div>

    @push('scripts')
        <script>
            $('#formstat').on('submit', function (event) {
                event.preventDefault();
                var param = $(this).serialize();

                $.getJSON('/api/stat?' + param, function (data) {
                    var ctx = document.getElementById("myChartGeneral").getContext('2d');
                    var myLineChart = new Chart(ctx, data);
                });
            });
        </script>
    @endpush


@endsection
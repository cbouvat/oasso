@extends('layouts.app')

@section('content')
    <h1>Statistiques</h1>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href={{route('admin.statistic.index')}}>Général</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href={{route('admin.statistic.subscription')}}>Adhésions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href={{route('admin.statistic.city')}}>Villes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href={{route('admin.statistic.receipt')}}>Recettes</a>
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
        <div class="col-2 mt-4 pt-1">
            <input class="btn btn-primary" id="btnGeneralPersonalized" type="submit" value="Envoyer">
        </div>
    </form>

    <canvas id="myChartGeneral" width="400" height="200"></canvas>
    <div id="tabStat">

    </div>

    @push('scripts')
        <script>
            var myLineChart;

            $('#formstat').on('submit', function (event) {
                event.preventDefault();
                var param = $(this).serialize();
                if (myLineChart) {
                    myLineChart.destroy();
                }

                $.getJSON('/api/stat?' + param, function (data) {
                    var ctx = document.getElementById("myChartGeneral").getContext('2d');
                    myLineChart = new Chart(ctx, data);
                });
            });
        </script>
    @endpush


@endsection
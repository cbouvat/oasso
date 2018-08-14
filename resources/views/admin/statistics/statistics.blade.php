@extends('layouts.app')

@section('content')
    <h1>Statistiques</h1>
    <form class="form-row" id="formstat">
        <div class="col-2">
            <label for="type"> Type </label>
            <select class="custom-select mr-sm-2" name="type" id="type">
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
                var selectType = $("#type").val();

                $.getJSON('/api/stat?' + param, function (data) {
                    var ctx = document.getElementById("myChartGeneral").getContext('2d');
                    var myLineChart = new Chart(ctx, data);

                    if (selectType==="cities") {

                        var sumSubscribers = 0;
                        for (var i = 0; i < data.data.labels.length; i++) {
                            sumSubscribers += data.data.datasets[0].data[i];
                        }

                        function arrayStat() {
                            var response = "";
                            for (var j = 0; j < data.data.labels.length; j++) {
                                var percentage = (data.data.datasets[0].data[j] / sumSubscribers) * 100;
                                response +=
                                    '<tr>' +
                                    '<td>' + data.data.labels[j] + '</td>' +
                                    '<td>' + percentage + '</td>' +
                                    '<td>' + data.data.datasets[0].data[j] + '</td>' +
                                    '</tr>';
                            }
                            return response;
                        }

                        $('#tabStat').html("");
                        $('#tabStat').append(
                            '<table class="table">' +
                            '<thead>' +
                            '<tr>' +
                            '<th>Villes</th>' +
                            '<th>Pourcentages d\'adhérents</th>' +
                            '<th>Nombres d\'adhérents</th>' +
                            '</tr>' +
                            '</thead>' +
                            '<tbody>' + arrayStat() + '</tbody></table>');

                    }else{
                        $('#tabStat').html("");
                    }
                });
            });
        </script>
    @endpush
@endsection

@extends('layouts.app')

@section('content')
    <h1>Statistiques</h1>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href={{route('admin.statistic.index')}}>Général</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href={{route('admin.statistic.subscription')}}>Adhésions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href={{route('admin.statistic.city')}}>Villes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href={{route('admin.statistic.receipt')}}>Recettes</a>
        </li>
    </ul>

    <form class="form-row mt-2" id="formstat">
        <input name="type" value="receipts" id="type" hidden>
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

    <canvas id="myChartGeneral" width="200" height="100"></canvas>

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

                    function arrayStat() {
                        var response = "";

                        var sum =[0,0];

                        // sum of subscriptions
                        for (var i=0; i < data.data.labels.length; i++)
                        {
                            sum[0]+= data.data.datasets[0].data[i];
                        }

                        // sum of gifts
                        for (var k=0; k < data.data.labels.length; k++)
                        {
                            sum[1]+= data.data.datasets[1].data[k];
                        }
                        var percentage = [0,0];

                        percentage[0] = Math.round(sum[0] /(sum[0]+sum[1]) * 100 * 100)/100;
                        percentage[1] = 100 - percentage[0];

                        for (var j = 0; j < data.data.datasets.length; j++) {
                            console.log(j);
                            response +=
                                '<tr>' +
                                '<td>'+ data.data.datasets[j].label + '</td>' +
                                '<td>' + percentage[j]+ '%' + '</td>' +
                                '<td>' + sum[j] + '</td>' +
                                '</tr>';
                        }
                        return response;
                    }

                    console.log(arrayStat());

                    $('#tabStat').html("");
                    $('#tabStat').append(
                        '<table class="table">' +
                        '<thead>' +
                        '<tr>' +
                        '<th> </th>' +
                        '<th> Répartition Pourcentages</th>' +
                        '<th>Nombre Total</th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody>' + arrayStat() + '</tbody></table>');
                });
            });
        </script>
    @endpush

@endsection
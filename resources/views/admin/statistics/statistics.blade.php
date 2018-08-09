@extends('layouts.app')

@section('content')
    <div class="mt-5 pt-5">
        <div class="mb-3">
            <h2>Statistiques</h2>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Général</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Adhésion</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Ville</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Recettes</a>
                </div>
            </div>
            <div class="col-9">
                <ul class="nav justify-content-center nav nav-pills"  role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="month" data-toggle="pill">Mois</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="year" data-toggle="pill">Année</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="personalized" data-toggle="pill">Personnalisé</a>
                    </li>
                </ul>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="row mt-5">
                            <div class="col-6">
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            </div>
                            <div class="col-6">
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                <canvas id="myChartGeneral" width="400" height="200"></canvas>
                                @push('scripts')
                                    <script>
                                        $(function() {

                                            $('#month').click(function() {
                                                $.getJSON('/test.json', function(data) {
                                                    var ctx = document.getElementById("myChartGeneral").getContext('2d');
                                                    var myLineChart = new Chart(ctx, data);
                                                });
                                            });

                                            $('#year').click(function() {
                                                $.getJSON('/testYears.json', function(data) {
                                                    var ctx = document.getElementById("myChartGeneral").getContext('2d');
                                                    var myLineChart = new Chart(ctx, data);
                                                });
                                            });

                                            $('#personalized').click(function() {
                                                $.getJSON('/testYears.json', function(data) {
                                                    var ctx = document.getElementById("myChartGeneral").getContext('2d');
                                                    var myLineChart = new Chart(ctx, data);
                                                });
                                            });


                                            $('myChartGeneral').ready(function() {
                                                $.getJSON('/test.json', function(data) {
                                                    var ctx = document.getElementById("myChartGeneral").getContext('2d');
                                                    var myLineChart = new Chart(ctx, data);
                                                });
                                            });
                                        });
                                    </script>
                                @endpush

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="row mt-5">
                            <div class="col-6">
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            </div>
                            <div class="col-6">
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                Ici, on aura les diagrammes!
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="row mt-5 justify-content-center">
                            <table class="table table-striped table-dark" style="max-width: 70%;">
                                <thead>
                                <tr>
                                    <th scope="col">Villes</th>
                                    <th scope="col">Pourcentage adhérents</th>
                                    <th scope="col">Nombre adhérents</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row mt-5">
                            Ici, on aura les diagrammes!

                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="row mt-5">
                            <div class="col-6">
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            </div>
                            <div class="col-6">
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                <canvas id="myChart" width="400" height="200"></canvas>
                                @push('scripts')
                                    <script>
                                        var ctx = document.getElementById("myChart").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                                                datasets: [{
                                                    label: '# of Votes',
                                                    data: [12, 19, 3, 5, 2, 3],
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255,99,132,1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)',
                                                        'rgba(153, 102, 255, 1)',
                                                        'rgba(255, 159, 64, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero:true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                    </script>
                                @endpush
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

@endsection
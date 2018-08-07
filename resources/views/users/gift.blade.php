@extends('layouts.app')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div>
                    <h1>Faire un Don</h1>
                </div>
                <div class="text-center p-5 border border-success rounded">
                    <h5>Participer d'avantage à l'Association {{config('app.name')}}</h5>

                    <div class="col-12 col-md-4 offset-md-4 mt-5">
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">.00€</span>
                            </div>
                        </div>
                        <div class="btn btn-outline-success btn-block mt-3">
                            <h2>Donner</h2>
                        </div>

                    </div>

                </div>

            </div>

        </div>
        <div class="row pt-5">
            <div class="col-12">
                <div>
                    <h1>Votre Historique de don</h1>
                </div>
                <div class="text-center p-5 border border-success rounded">
                    <table class="table">
                        <thead class="bg-success text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Montant</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- @ forelse gifts as gift -->
                        <tr>
                            <th scope="row">gift_id</th>
                            <td>$montant</td>
                            <td>$date</td>
                        </tr>
                        <!-- @ enforelse gifts as gift -->
                        <!-- @ empty -->
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
@endsection
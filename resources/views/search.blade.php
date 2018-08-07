@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-8">
                @if ($errors->has('q'))
                    <h2 class="mb-2 ">No result !</h2>
                    <div class="row">
                        <div class="alert alert-danger ">
                            <strong>{{ $errors->first('q')}}</strong>
                        </div>
                    </div>
                @endif
                    @isset($members)
                        <table class="table table-striped mt-5 pt-5">
                            <thead>
                            <tr>
                                <th scope="col">N° Adhérent</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td scope="col">{{$member->id}}</td>
                                    <td scope="col">{{$member-> firstname}}</td>
                                    <td scope="col">{{$member->lastname}}</td>
                                    <td scope="col">{{$member->email}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @endisset
            </div>
        </div>
@endsection
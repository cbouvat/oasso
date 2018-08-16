@extends('layouts.app')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item">Export</li>
            </ol>
        </nav>
    </div>
    <h1>{{ __('Export') }}</h1>


    <form id="formExport" method="post" action="{{ route('admin.export.export') }}">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="exportFile">Quoi exporter ?</label>
            <div class="col-sm-10">
                <select class="custom-select" id="exportFile" name="exportFile" required>
                    <option selected value="">Choisir...</option>
                    <option value="users">{{ __('Users') }}</option>
                    <option value="gifts">{{ __('Gifts') }}</option>
                    <option value="payments">{{ __('Payments') }}</option>
                    <option value="subscriptions">{{ __('Subscriptions') }}</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="exportFormat">Format d'export</label>
            <div class="col-sm-10">
                <select class="custom-select" id="exportFormat" name="exportFormat" required>
                    <option selected value="">Choisir...</option>
                    <option value="xlsx">.XLSX</option>
                    <option value="csv">.CSV</option>
                </select>
            </div>
        </div>

        <br>
        <hr>
        <br>
        <div id="usersParams" style="display: none;">
            <h3>{{__('Parameters')}}</h3>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="state">{{__('State')}}</label>
                <div class="col-sm-3">
                    <select class="custom-select" id="state" name="state">
                        <option selected value="">Comptes enregistrés</option>
                        <option value="onlyTrashed">Comptes supprimés</option>
                        <option value="withTrashed">Tous</option>
                    </select>
                </div>
                <label class="col-sm-2  offset-2 col-form-label" for="status">{{__('Membership status')}}</label>
                <div class="col-sm-3">
                    <select class="custom-select" id="status" name="status">
                        <option selected value="">Tous</option>
                        <option value="1">Adhésions en cours</option>
                        <option value="2">Adhésions périmées</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="volonteer">{{__('Volonteer')}}</label>
                <div class="col-sm-3">
                    <select class="custom-select" id="volonteer" name="volonteer">
                        <option selected value="">Tous</option>
                        <option value="1">Volontaires</option>
                        <option value="0">Non volontaires</option>
                    </select>
                </div>
                <label class="col-sm-2 offset-2 col-form-label" for="type">{{__('Period')}}</label>
                <div class="col-sm-3">
                    <div id="inputDate">
                        <input id="startDate" type="text" onfocus="(this.type='date')" onblur="(this.type='text')"
                               class="form-control" name="startDate" placeholder="Date de début (incluse)">
                        <input style="margin-top: 5px" id="endDate" type="text" onfocus="(this.type='date')"
                               onblur="(this.type='text')"
                               class="form-control" name="endDate" placeholder="Date de fin (incluse)">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="delivery">{{__('Delivery')}}</label>
                <div class="col-sm-3">
                    <select class="custom-select" id="delivery" name="delivery">
                        <option selected value="">Tous</option>
                        <option value="1">Livreurs</option>
                        <option value="0">Non livreurs</option>
                    </select>
                </div>

                <label class="col-sm-2 offset-2 col-form-label" for="newspaper">{{__('Newspaper')}}</label>

                <div class="col-sm-3">
                    <select class="custom-select" id="newspaper" name="newspaper">
                        <option selected value="">Tous</option>
                        <option value="1">Abonnés journal</option>
                        <option value="0">Non abonnés</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="newsletter">{{__('Newsletter')}}</label>
                <div class="col-sm-3">
                    <select class="custom-select" id="newsletter" name="newsletter">
                        <option selected value="">Tous</option>
                        <option value="1">Abonnés newsletter</option>
                        <option value="0">Non abonnés</option>
                    </select>
                </div>
                <label class="col-sm-2 offset-2 col-form-label" for="city">{{__('City')}}</label>

                <div class="col-sm-3">
                    <select class="custom-select" id="city" name="city">
                        <option selected value="">Tous</option>
                        @foreach($cities as $key => $value)
                            <option value="{{$value}}">{{$value.' -- '.$key}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="ageOperator">{{__('Age')}}</label>
                <div class="col-sm-2">
                    <select class="custom-select" id="ageOperator" name="ageOperator">
                        <option selected value="=">Egal à</option>
                        <option value=">=">Supérieur à</option>
                        <option value="<=">Inférieur à</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <input class="form-control" type="text" name="ageNumber" id="ageNumber" value="">
                </div>
                <label class="col-sm-2 offset-2 col-form-label" for="gender">{{__('Gender')}}</label>

                <div class="col-sm-3">
                    <select class="custom-select" id="gender" name="gender">
                        <option selected value="">Tous</option>
                        <option value="2">Femme</option>
                        <option value="1">Homme</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="phone">{{__('Phone')}}</label>
                <div class="col-sm-3">
                    <select class="custom-select" id="phone" name="phone">
                        <option selected value="">Tous</option>
                        <option value="^0[67][0-9]{8}$">On un portable</option>
                        <option value="^0[1-589][0-9]{8}$">On un fixe</option>
                    </select>
                </div>
                <label class="col-sm-2 offset-2 col-form-label" for="gift">{{__('Gift')}}</label>
                <div class="col-sm-3">
                    <select class="custom-select" id="gift" name="gift">
                        <option selected value="">Tous</option>
                        <option value="0">Donateur</option>
                        <option value="1">Non donateur</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row justify-content-center">
            <input type="submit" value="Exporter" class="btn btn-primary">
        </div>
    </form>
    @push('scripts')
        <script>

            $('#exportFile').change(function () {
                if ($('#exportFile option:selected').val() === 'users') {
                    $('#usersParams').css('display', 'block');
                } else {
                    $('#usersParams').css('display', 'none');
                }
            });

            $('#status').change(function () {
                switch ($(this).val()) {
                    case "":
                        $('#inputDate').css('visibility', 'visible');
                        break;
                    default:
                        $('#inputDate').css('visibility', 'hidden');
                }
            });
        </script>
    @endpush

@endsection
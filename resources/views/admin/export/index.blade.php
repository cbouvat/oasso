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


    <form method="post" action="{{ route('admin.export.export') }}">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="inputGroupSelect01">Quoi exporter ?</label>
            <div class="col-sm-10">
                <select class="custom-select" id="inputGroupSelect01" name="export_file" required>
                    <option selected disabled>Choisir...</option>
                    <option value="users">{{ __('Users') }}</option>
                    <option value="gifts">{{ __('Gifts') }}</option>
                    <option value="payments">{{ __('Payments') }}</option>
                    <option value="subscriptions">{{ __('Subscriptions') }}</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="inputGroupSelect01">Format d'export</label>
            <div class="col-sm-10">
                <select class="custom-select" id="inputGroupSelect01" name="export_format" required>
                    <option selected disabled>Choisir...</option>
                    <option value="xlsx">.XLSX</option>
                    <option value="csv">.CSV</option>
                </select>
            </div>
        </div>
        <input type="submit" value="Exporter" class="btn btn-primary">
    </form>


@endsection
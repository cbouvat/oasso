@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>{{ __('Export') }}</h1>
    </div>

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="breadcrumb-item">Export</li>
            </ol>
        </nav>
    </div>

    <form method="post" action="{{ route('admin.export.export') }}">
        @csrf
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="export_file">Quoi exporter ?</label>
            <div class="col-sm-8">
                <select class="custom-select" id="export_file" name="export_file" required>
                    <option selected disabled>Choisir...</option>
                    <option value="users">{{ __('Members') }}</option>
                    <option value="gifts">{{ __('Gifts') }}</option>
                    <option value="payments">{{ __('Payments') }}</option>
                    <option value="subscriptions">{{ __('Subscriptions') }}</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="export_format">Format d'export</label>
            <div class="col-sm-8">
                <select class="custom-select" id="export_format" name="export_format" required>
                    <option selected disabled>Choisir...</option>
                    <option value="xlsx">Excel (.xlsx)</option>
                    <option value="csv">Excel (.csv)</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-8 offset-sm-4">
                <input type="submit" value="Exporter" class="btn btn-primary">
            </div>
        </div>
    </form>

@endsection
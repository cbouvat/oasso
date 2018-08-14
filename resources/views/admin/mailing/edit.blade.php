@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ '/home' }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ '/admin/mailing' }}">Mailing</a></li>
                <li class="breadcrumb-item">Modification mail</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div>
                <h1>Edition mail</h1>
            </div>

            <div class="col-12 col-md-4 offset-md-4 mt-5">
                <form action="{{route('admin.mailing.update', ['id' => $mailing->id])}}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label for="title">Titre du mail :</label>
                    </div>
                    <input type="text" name="title" class="form-control" value="{{ $mailing->title }}">
                    <div class="input-group mt-5">
                        <label for="text_content">Contenu du mail :</label>
                    </div>
                    <textarea rows="20" cols="20" type="text" name="text_content" class="form-control">{{ $mailing->text_content }}</textarea>
                    <div class="text-center mt-5">
                        <input type="submit" class="btn btn-success" value="Modifier">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
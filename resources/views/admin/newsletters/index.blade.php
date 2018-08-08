@extends('layouts.app')
<link rel="stylesheet" href="//cdn.quilljs.com/1.3.6/quill.snow.css">
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
@section('content')

    <form method="post" action="{{ route('admin.newsletters.create') }}">
        @csrf
        <div class="row justify-content-center mt-5">
            <div class=" col-md-12 ">
                <div>
                    <h1>{{__('Newsletter page title')}}</h1>
                </div>

                <label></label>
                <input id="title" class="mt-3 mb-3" type="text" name="title" placeholder="Title">

                <div class="col-md-12" style="height:600px" id="editor"></div>

                <label for="html"></label>
                <textarea id="html" name="html"></textarea>
                <label for="text"></label>
                <textarea id="text" name="text"></textarea>

                <div class="row justify-content-around m-2">
                    <input type="reset" class="btn btn-danger" value="Effacer">
                    <input type="submit" class="btn btn-primary" value="Enregistrer">
                </div>

                <script> // Init Quill
                    let quill = new Quill('#editor', {
                        modules: {
                            toolbar: [
                                [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
                                [{'header': [1, 2, 3, 4, 5, 6, false]}],
                                ['bold', 'italic', 'underline', 'strike', 'link'],        // toggled buttons
                                [{'list': 'bullet'}],
                                [{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent
                                [{'color': []}, {'background': []}],          // dropdown with defaults from theme
                                [{'align': []}],
                                ['link', 'image']
                            ]
                        },
                        placeholder: 'build your own newsletter',
                        theme: 'snow'  // or 'bubble'
                    });

                    // Get Quill data and send it to the two textarea in html and text.
                    quill.on('text-change', function () {
                        let quillContentHtml = document.querySelector('.ql-editor').innerHTML;
                        document.getElementById('html').value = quillContentHtml;

                        let quillContentText = quill.getText();
                        document.getElementById('text').value = quillContentText;

                        document.getElementById('title').value = 'title';
                    });
                </script>
            </div>
        </div>
    </form>
@endsection
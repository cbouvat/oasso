@extends('layouts.app')
<link rel="stylesheet" href="//cdn.quilljs.com/1.3.6/quill.snow.css">
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
@section('content')

    <form method="POST" action="{{ Route('') }}">

        <div class="row justify-content-center mt-5">
            <div class=" col-md-12 ">
                <div>
                    <h1>{{__('Newsletter page title')}}</h1>
                </div>

                <div class="col-md-12" style="height:600px" id="editor"></div>

                <div class="row justify-content-around m-2">
                    <button type="reset" class="btn btn-danger " value="Effacer">Effacer</button>
                    <button type="submit" class="btn btn-primary" value="Enregistrer">Enregistrer
                    </button>
                </div>

                <script>
                    var quill = new Quill('#editor', {
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

                    quill.on('text-change', function () {
                        let content = document.querySelector('.ql-editor').innerHTML;
                        console.log(content);
                        var text = quill.getText();
                        console.log(text)
                    });


                </script>

            </div>
        </div>
    </form>


@endsection
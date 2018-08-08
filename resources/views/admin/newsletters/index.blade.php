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

                <div class="col-md-4 mb-3">
                    <label></label>
                    <input id="title" class="input-group mt-2 mb-2" type="text" name="title" placeholder="Title">

                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04">
                            <option selected>Choose...</option>
                            <@foreach($sentMessage as $sent)
                                <option value="1">{{ $sent->title }}</option>
                            @endforeach

                        </select>
                        <div class="input-group-append">
                            <button id="copy" class="btn btn-outline-secondary" type="button">Copy</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="height:600px" id="editor"></div> <!-- Quill editor -->

                <!--textarea used to send Quill data to the controller via the id-->
                <label for="html"></label>
                <textarea id="html" name="html" style="display: none"></textarea>
                <label for="text"></label>
                <textarea id="text" name="text" style="display: none"></textarea>

                <input type="submit" class="btn btn-primary m-2" value="Enregistrer">


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


                        let sentMessageCopy = document.getElementById('sentMessageCopy').value;
                        let onCopy = document.getElementById('copy');
                        onCopy.onclick = copy;

                        function copy(){
                            quill.setContents(sentMessageCopy); // send sentMessageCopy to editor
                        }
                    });
                </script>

                <!--textarea used to get the choosen sentMessage for script-->
                <label for="sentMessageCopy"></label>
                <textarea id="sentMessageCopy" name="sentMessageCopy" style="display: none"></textarea>
            </div>
        </div>
    </form>
@endsection
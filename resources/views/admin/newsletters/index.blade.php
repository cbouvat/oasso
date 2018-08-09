@extends('layouts.app')
<link rel="stylesheet" href="//cdn.quilljs.com/1.3.6/quill.snow.css">
@section('content')

    <form method="post" action="{{ route('admin.newsletters.create') }}">
        @csrf
        <div class="row justify-content-center mt-5">
            <div class=" col-md-12 ">
                <div>
                    <h1>{{__('Newsletter page title')}}</h1>
                </div>

                <div class="row col-md-6 mb-3">
                    <label>Title</label>
                    <input id="newsletterTitle" class="input-group mb-2" type="text" name="newsletterTitle">
                    @if ($errors->has('newsletterTitle'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('newsletterTitle') }}</strong>
                                    </span>
                    @endif
                    <div class="input-group">
                        <label for="inputGroupSelect"></label>
                        <select class="custom-select" id="inputGroupSelect">
                            <option selected disabled value="">Choose an old newsletter or write a new one</option>
                            @foreach($newsletters as $newsletter)
                                <option value="{{$newsletter->html_content}}">{{$newsletter->title}}</option>
                            @endforeach

                        </select>
                        <div class="input-group-append">
                            <input type="reset" id="new" style="display: none" class="btn btn-outline-secondary"
                                   value="new">
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="height:600px" id="editor"></div> <!-- Quill editor -->
            {{--@if ($errors->has('content'))--}}
            {{--<span class="invalid-feedback">--}}
            {{--<strong>{{ $errors->first('content') }}</strong>--}}
            {{--</span>--}}
            {{--@endif--}}

            <!--textarea used to send Quill data to the controller via the id-->

                <textarea id="html" name="html" style="display: none"></textarea>

                <textarea id="text" name="text" style="display: none"></textarea>

                <input type="submit" class="btn btn-primary m-2" value="Enregistrer">

                <!--textarea used to get the choosen sentMessage for script-->
                <label for="sentMessageCopy"></label>
                {{--<textarea id="sentMessageCopy" name="sentMessageCopy" style="display: none">{{ $sent }}</textarea>--}}
            </div>
        </div>
    </form>
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
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
            $('#html').val(quill.root.innerHTML);

            $('#text').val(quill.getText());
        });


        //watch select change and update Quill editor with the chosen newsletter
        $('#inputGroupSelect').change(function () {
            quill.root.innerHTML = $('#inputGroupSelect').val(); // send newsletter to editor

            $('#newsletterTitle').val($('#inputGroupSelect option:selected').text());

            $('#new').css("display", "block");
        });

        //Reset form and quill content
        $('#new').click(function () {
            quill.setContents([]);
            $('#new').css("display", "none");
        });

        //error return

        {{--quill.setContents([--}}
        {{--{insert: "{{ strip_tags(old('content')) }}"}--}}
        {{--]);--}}

    </script>
@endsection

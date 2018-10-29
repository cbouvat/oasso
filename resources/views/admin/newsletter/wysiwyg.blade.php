<div class="row col-md-6 mb-3">

    @isset($newsletter)
        <input id="newsletterTitle" class="col mb-2" type="text" name="title"
               value="{{ $newsletter->title }}" placeholder="{{__('Email subject')}}">
    @endisset
    @empty($newsletter)
        <input id="newsletterTitle" class="input-group mb-2" type="text" name="title" placeholder="{{__('Email subject')}}">
    @endempty

    @if ($errors->has('newsletterTitle'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('newsletterTitle') }}</strong>
        </span>
    @endif

</div>
<div class="col-md-12" style="min-height:600px" id="editor"></div> <!-- Quill editor -->

<!--check if error on the content, if yes set the Quill content has it was before with some script-->
@if ($errors->has('content'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('content') }}</strong>
    </span>
@endif

<!--textarea used to send Quill data to the controller via the id-->
@isset($newsletter)
    <textarea id="htmlContent" name="html_content" style="display: none">{{ $newsletter->html_content }}</textarea>
    <textarea id="textContent" name="text_content" style="display: none"></textarea>
@endisset
@empty($newsletter)
    <textarea id="htmlContent" name="html_content" style="display: none"></textarea>
    <textarea id="textContent" name="text_content" style="display: none"></textarea>
@endempty

@push('scripts')
<script> // Init Quill
  let quill = new Quill('#editor', {
    modules: {
      toolbar: [
        [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown size text
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

  // Get Quill data and send it to the two textarea in html and text format.
  quill.on('text-change', function () {
    $('#htmlContent').val(quill.root.innerHTML);

    $('#textContent').val(quill.getText());
  });


  //Update Quill editor with the chosen newsletter
  $(document).ready(function () {
    quill.root.innerHTML = $('#htmlContent').val(); // send newsletter to editor
  });


  //error return, set the quill content.

  quill.setContents([
    {insert: "{{ strip_tags(old('content')) }}"}
  ]);

</script>
@endpush

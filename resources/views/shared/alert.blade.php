@if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
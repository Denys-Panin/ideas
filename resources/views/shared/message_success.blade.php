@if (session('succes'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('succes')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

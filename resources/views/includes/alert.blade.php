@if(session('message'))
<div class="container-fluid px-5">
    <div class="d-flex justify-content-center">
        <div class="alert alert-info w-50 px-5 alert-dismissible fade show mt-2" role="alert">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>

@endif

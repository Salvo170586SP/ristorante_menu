@if(session('message'))
<div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
    <strong>{{ session('message') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

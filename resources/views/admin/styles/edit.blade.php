@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center flex-column py-5">
            <h1 class="text-3xl my-9">Modifica Le Tue Impostazioni</h1>
            <a href="{{ route('admin.styles.index') }}" class="btn btn-secondary shadow px-5 py-2 my-3">Torna alla lista</a>
        </div>
        <div class="col-12">
            @include('includes.errorsAlert')
            <form action="{{ route('admin.styles.update', $style->id) }}" method="post" class="mt-5">
                @csrf
                @method('put')
                @include('admin.styles.form')
               
                <button type="submit" class="btn btn-primary shadow">Modifica</button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('additional-scripts')
<script>
    var rangeInput = document.getElementById('customRange');
    var rangeInput2 = document.getElementById('customRange2');
    var rangeValueElement = document.getElementById('rangeValue');
    var rangeValueElement2 = document.getElementById('rangeValue2');

    rangeInput.addEventListener('input', function() {
        rangeValueElement.textContent = rangeInput.value;
    });
    rangeInput2.addEventListener('input', function() {
        rangeValueElement2.textContent = rangeInput2.value;
    });

</script>
@endpush

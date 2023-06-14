@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="text-3xl my-9">Crea Special Long Drink</h1>
            <a href="{{ route('admin.special_long_drinks.index') }}" class="btn btn-secondary shadow">Torna alla lista</a>
        </div>
        <div class="col-12">
            @include('includes.errorsAlert')
            <form action="{{ route('admin.special_long_drinks.store') }}" method="post" class="mt-5">
                @csrf
                @include('admin.special_long_drinks.form')
                <button class="btn btn-primary shadow">Crea</button>
            </form>

        </div>
    </div>
</div>
@endsection

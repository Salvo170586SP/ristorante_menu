@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="text-3xl my-9">Crea Birra</h1>
            <a href="{{ route('admin.beers.index') }}" class="btn btn-secondary shadow">Torna alla lista</a>
        </div>
        <div class="col-12">
                <form action="{{ route('admin.beers.store') }}" method="post" class="mt-5">
                    @csrf
                    @include('admin.beers.form')
                    <button class="btn btn-primary shadow">Crea</button>
                </form>
             
        </div>
    </div>
</div>
@endsection

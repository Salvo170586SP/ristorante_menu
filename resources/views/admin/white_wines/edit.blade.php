@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center py-5">
            <h1 class="text-3xl my-9">Modifica White Wine</h1>
            <a href="{{ route('admin.white_wines.index') }}" class="btn btn-secondary shadow">Torna alla lista</a>
        </div>
        <div class="col-12">
            @include('includes.errorsAlert')
            <form action="{{ route('admin.white_wines.update', $whiteWine->id) }}" method="post" class="mt-5">
                @csrf
                @method('put')
                @include('admin.white_wines.form')
                <button type="submit" class="btn btn-primary shadow">Modifica</button>
            </form>
        </div>
    </div>
</div>
@endsection

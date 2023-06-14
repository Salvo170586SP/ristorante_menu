@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center py-5">
            <h1>Dettaglio Long Drink</h1>
            <a href="{{ route('admin.long_drinks.index') }}" class="btn btn-secondary shadow">Torna alla lista</a>
        </div>

        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title">Nome: {{ $longDrink->name }}</h3>
                    <h4>Prezzo: @if($longDrink->price) €{{ $longDrink->price }} @else -- @endif</h4>
                    <p class="card-text">Descrizione: @if($longDrink->description) {{ $longDrink->description }} @else -- @endif</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

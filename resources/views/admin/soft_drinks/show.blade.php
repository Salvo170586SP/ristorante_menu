@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center py-5">
            <h1>Dettaglio Soft Drink</h1>
            <a href="{{ route('admin.soft_drinks.index') }}" class="btn btn-secondary shadow">Torna alla lista</a>
        </div>

        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title">Nome: {{ $softDrink->name }}</h2>
                    <h5>Prezzo: @if($softDrink->price) €{{ $softDrink->price }} @else -- @endif</h5>
                    <h5>Quantità: @if($softDrink->quantity_cl) {{ $softDrink->quantity_cl }}cl @else -- @endif</h5>
                    <p class="card-text">Descrizione: @if($softDrink->description) {{ $softDrink->description }} @else -- @endif</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

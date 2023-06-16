@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center py-5">
            <h1>Dettaglio Amaro</h1>
            <a href="{{ route('admin.bitter_drinks.index') }}" class="btn btn-secondary shadow">Torna alla lista</a>
        </div>

        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title">Nome: {{ $bitterDrink->name }}</h2>
                    <h5>Prezzo: @if($bitterDrink->price) €{{ number_format($bitterDrink->price, 2, '.', ',')  }} @else -- @endif</h5>
                    <h5>Quantità: @if($bitterDrink->quantity_cl) {{ $bitterDrink->quantity_cl }}cl @else -- @endif</h5>
                    <p class="card-text">Descrizione: @if($bitterDrink->description) {{ $bitterDrink->description }} @else -- @endif</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

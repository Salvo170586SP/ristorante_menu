@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center py-5">
            <h1>Dettaglio Prodotto</h1>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary shadow">Torna alla lista</a>
        </div>

        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title mb-3">Nome: {{ $product->name }}</h5>
                    <p>Produttore: @if($product->manufacturer) {{ $product->manufacturer }} @else -- @endif</p>
                    <p class="card-text">Prezzo: @if($product->price) €{{ number_format($product->price, 2, '.', ',')  }} @else -- @endif</p>
                    <p>Prezzo Calice:  @if($product->price_goblet ) {{ $product->price_goblet }} @else -- @endif</p>
                    <p>Prezzo Bottiglia: @if($product->price_bottle) {{ $product->price_bottle }} @else -- @endif</p>
                    <p>Quantità cl: @if($product->quantity_cl) {{ $product->quantity_cl }} @else -- @endif</p>
                    <p>Quantità lt: @if($product->quantity_lt) {{ $product->quantity_lt }} @else -- @endif</p>
                    <p>Categoria: @if($product->category) {{ $product->category->name_category }} @else -- @endif </p>
                    <p class="card-text">Descrizione: @if($product->description) {{ $product->description }} @else -- @endif</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

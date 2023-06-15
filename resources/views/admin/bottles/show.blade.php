@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center py-5">
            <h1>Dettaglio Bottle</h1>
            <a href="{{ route('admin.bottles.index') }}" class="btn btn-secondary shadow">Torna alla lista</a>
        </div>

        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title">Nome: {{ $bottle->name }}</h2>
                    <h5>Prezzo: @if($bottle->price) €{{ $bottle->price }} @else -- @endif</h5>
                    <h5>Quantità: @if($bottle->quantity_lt) {{ $bottle->quantity_lt }}lt @else -- @endif</h5>
                    <p class="card-text">Descrizione: @if($bottle->description) {{ $bottle->description }} @else -- @endif</p>
                </div>
            </div
        </div>
    </div>
</div>
@endsection

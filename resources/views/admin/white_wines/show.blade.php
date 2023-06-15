@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center py-5">
            <h1>Dettaglio White Wine</h1>
            <a href="{{ route('admin.white_wines.index') }}" class="btn btn-secondary shadow">Torna alla lista</a>
        </div>

        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title">Nome: {{ $whiteWine->name }}</h2>
                    <h5>Prezzo Bottiglia: @if($whiteWine->price_bottle) €{{ $whiteWine->price_bottle }} @else -- @endif</h5>
                    <h5>Prezzo Calice: @if($whiteWine->price_goblet) €{{ $whiteWine->price_goblet }} @else -- @endif</h5>
                    <p class="card-text">Descrizione: @if($whiteWine->description) {{ $whiteWine->description }} @else -- @endif</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

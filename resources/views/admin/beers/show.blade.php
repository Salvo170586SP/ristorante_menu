@extends('layouts.app')

@section('content')    
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center py-5">
            <h1>Dettaglio Beer</h1>
            <a href="{{ route('admin.beers.index') }}" class="btn btn-secondary shadow">Torna alla lista</a>
        </div>

        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title">Nome: {{ $beer->name }}</h2>
                    <h5>Prezzo Bottiglia: @if($beer->price_bottle) €{{ $beer->price_bottle }} @else -- @endif</h5>
                    <h5>Prezzo Calice: @if($beer->price_goblet) €{{ $beer->price_goblet }} @else -- @endif</h5>
                    <p class="card-text">Descrizione: @if($beer->description) {{ $beer->description }} @else -- @endif</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
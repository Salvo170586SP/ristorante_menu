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
                    <h5>Prezzo: @if($beer->price) €{{ number_format($beer->price, 2, '.', ',')  }}  @else -- @endif</h5>
                    <h5>Quantità: @if($beer->cl) {{ $beer->cl }}cl @else -- @endif</h5>
                    <p class="card-text">Descrizione: @if($beer->description) {{ $beer->description }} @else -- @endif</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="text-3xl my-9">Lista Soft Drinks</h1>
            <a href="{{ url('admin') }}" class="btn btn-secondary shadow px-5 py-2">Torna alla dashboard</a>
        </div>


        <div class="col-12 col-sm d-sm-block d-md-none mt-4">
            <a href="{{ route('admin.soft_drinks.create') }}" class="btn btn-primary px-5 py-2 shadow mb-3 my-3 ">Crea</a>
        </div>
        @include('includes.alert')
        {{-- MOBILE --}}
        @foreach($soft_drinks as $red_wine)
        <div class="col-sm d-sm-block d-md-none my-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nome: {{ $red_wine->name }}</h5>
                    <p class="card-text">Prezzo: @if($red_wine->price) €{{ number_format($red_wine->price, 2, '.', ',')  }} @else -- @endif</p>
                    <p class="card-text">Quantità: @if($red_wine->quantity_cl) {{ $red_wine->quantity_cl}}cl @else -- @endif</p>
                    <p class="card-text">Descrizione: @if($red_wine->description) {{ $red_wine->description }} @else -- @endif</p>
                    <a href="{{ route('admin.soft_drinks.show', $red_wine->id) }}" class="btn btn-primary">Vedi</a>
                    <a href="{{ route('admin.soft_drinks.edit', $red_wine->id) }}" class="btn btn-secondary mx-2">Modifica</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalMobile-{{ $red_wine->id }}">
                        Elimina
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalMobile-{{ $red_wine->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5>Sei sicuro di eliminare {{ $red_wine->name }}?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                    <form action="{{ route('admin.soft_drinks.destroy', $red_wine->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger shadow">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        
        {{-- FULL SCREEN --}}
        <div class="d-none col-md-12 d-md-block mt-5">
             <a href="{{ route('admin.soft_drinks.create') }}" class="btn btn-primary shadow mb-3 px-5 py-2">Crea</a>
            <h6>Totale dei prodotti in tabella: {{ count($soft_drinks) }}</h6>
            <table class="table shadow">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Descrizione</th>
                        <th>Prezzo</th>
                        <th>Quantità</th>
                        <th class="text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($soft_drinks as $soft_drink)
                    <tr>
                        <td>{{ $soft_drink->id }}</td>
                        <td>{{ $soft_drink->name }}</td>
                        <td>@if($soft_drink->description) {{ $soft_drink->description }} @else -- @endif</td>
                        <td>@if($soft_drink->price) €{{ number_format($soft_drink->price, 2, '.', ',') }} @else -- @endif</td>
                        <td>@if($soft_drink->quantity_cl) {{ $soft_drink->quantity_cl }}cl @else -- @endif</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('admin.soft_drinks.show', $soft_drink->id) }}" class="btn btn-primary">Vedi</a>
                                <a href="{{ route('admin.soft_drinks.edit', $soft_drink->id) }}" class="btn btn-secondary mx-2">Modifica</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $soft_drink->id }}">
                                    Elimina
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $soft_drink->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Sei sicuro di eliminare {{ $soft_drink->name }}?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                <form action="{{ route('admin.soft_drinks.destroy', $soft_drink->id) }}" method="post" data-title="{{ $soft_drink->name }}" class="delete-form">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger shadow">Elimina</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>Non ci sono Soft Drinks in lista</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

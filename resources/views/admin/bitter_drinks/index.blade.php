@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="text-3xl my-9">Lista Amari</h1>
            <a href="{{ url('admin') }}" class="btn btn-secondary shadow px-5 py-2">Torna alla dashboard</a>
        </div>

        <div class="col-12 col-sm d-sm-block d-md-none mt-4">
            <a href="{{ route('admin.aperitifs.create') }}" class="btn btn-primary px-5 py-2 shadow mb-3 my-3 ">Crea</a>
        </div>
        @include('includes.alert')
        {{-- MOBILE --}}
        @foreach($bitter_drinks as $bitter_drink)
        <div class="col-sm d-sm-block d-md-none my-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nome: {{ $bitter_drink->name }}</h5>
                    <p class="card-text">Prezzo: @if($bitter_drink->price) €{{ number_format($bitter_drink->price, 2, '.', ',')  }} @else -- @endif</p>
                    <p class="card-text">Quantità: @if($bitter_drink->price) {{ $bitter_drink->quantity_cl }} @else -- @endif</p>
                    <p class="card-text">Descrizione: @if($bitter_drink->description) {{ $bitter_drink->description }} @else -- @endif</p>
                    <a href="{{ route('admin.bitter_drinks.show', $bitter_drink->id) }}" class="btn btn-primary">Vedi</a>
                    <a href="{{ route('admin.bitter_drinks.edit', $bitter_drink->id) }}" class="btn btn-secondary mx-2">Modifica</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalMobile-{{ $bitter_drink->id }}">
                        Elimina
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalMobile-{{ $bitter_drink->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5>Sei sicuro di eliminare {{ $bitter_drink->name }}?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                    <form action="{{ route('admin.bitter_drinks.destroy', $bitter_drink->id) }}" method="post">
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
            <a href="{{ route('admin.bitter_drinks.create') }}" class="btn btn-primary shadow mb-3 px-5 py-2">Crea</a>
            <h6>Totale dei prodotti in tabella: {{ count($bitter_drinks) }}</h6>
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
                    @forelse($bitter_drinks as $bitter_drink)
                    <tr>
                        <td>{{ $bitter_drink->id }}</td>
                        <td>{{ $bitter_drink->name }}</td>
                        <td>@if($bitter_drink->description) {{ $bitter_drink->description }} @else -- @endif</td>
                        <td>@if($bitter_drink->price) €{{ number_format($bitter_drink->price, 2, '.', ',')  }}  @else -- @endif</td>
                        <td>@if($bitter_drink->quantity_cl) {{ $bitter_drink->quantity_cl }}cl @else -- @endif</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('admin.bitter_drinks.show', $bitter_drink->id) }}" class="btn btn-primary">Vedi</a>
                                <a href="{{ route('admin.bitter_drinks.edit', $bitter_drink->id) }}" class="btn btn-secondary mx-2">Modifica</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $bitter_drink->id }}">
                                    Elimina
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $bitter_drink->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Sei sicuro di eliminare {{ $bitter_drink->name }}?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                <form action="{{ route('admin.bitter_drinks.destroy', $bitter_drink->id) }}" method="post" data-title="{{ $bitter_drink->name }}" class="delete-form">
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
                        <td>Non ci sono Amari in lista</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

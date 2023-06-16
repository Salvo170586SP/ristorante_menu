@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="text-3xl my-9">Lista Red Wines</h1>
            <a href="{{ url('admin') }}" class="btn btn-secondary shadow px-5 py-2">Torna alla dashboard</a>
        </div>

        <div class="col-12 col-sm d-sm-block d-md-none mt-4">
            <a href="{{ route('admin.red_wines.create') }}" class="btn btn-primary px-5 py-2 shadow mb-3 my-3 ">Crea</a>
        </div>
        @include('includes.alert')
        {{-- MOBILE --}}
        @foreach($red_wines as $red_wine)
        <div class="col-sm d-sm-block d-md-none my-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nome: {{ $red_wine->name }}</h5>
                    <p class="card-text">Prezzo Bottiglia: @if($red_wine->price_bottle) €{{ number_format($red_wine->price_bottle, 2, '.', ',')  }} @else -- @endif</p>
                    <p class="card-text">Prezzo Calice: @if($red_wine->price_goblet) €{{ number_format($red_wine->price_goblet, 2, '.', ',')  }} @else -- @endif</p>
                    <p class="card-text">Descrizione: @if($red_wine->description) {{ $red_wine->description }} @else -- @endif</p>
                    <a href="{{ route('admin.red_wines.show', $red_wine->id) }}" class="btn btn-primary shadow">Vedi</a>
                    <a href="{{ route('admin.red_wines.edit', $red_wine->id) }}" class="btn btn-secondary shadow mx-2">Modifica</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $red_wine->id }}">
                        Elimina
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal-{{ $red_wine->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <form action="{{ route('admin.red_wines.destroy', $red_wine->id) }}" method="post">
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
            <a href="{{ route('admin.red_wines.create') }}" class="btn btn-primary shadow mb-3 px-5 py-2">Crea</a>
            <h6>Totale dei prodotti in tabella: {{ count($red_wines) }}</h6>
            <table class="table shadow">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Descrizione</th>
                        <th>Prezzo Bottiglia</th>
                        <th>Prezzo Calice</th>
                        <th class="text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($red_wines as $red_wine)
                    <tr>
                        <td>{{ $red_wine->id }}</td>
                        <td>{{ $red_wine->name }}</td>
                        <td>@if($red_wine->description) {{ $red_wine->description }} @else -- @endif</td>
                        <td>@if($red_wine->price_bottle) €{{ number_format($red_wine->price_bottle, 2, '.', ',') }} @else -- @endif</td>
                        <td>@if($red_wine->price_goblet) €{{ number_format($red_wine->price_goblet, 2, '.', ',') }} @else -- @endif</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('admin.red_wines.show', $red_wine->id) }}" class="btn btn-primary shadow">Vedi</a>
                                <a href="{{ route('admin.red_wines.edit', $red_wine->id) }}" class="btn btn-secondary shadow mx-2">Modifica</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $red_wine->id }}">
                                    Elimina
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $red_wine->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <form action="{{ route('admin.red_wines.destroy', $red_wine->id) }}" method="post" data-title="{{ $red_wine->name }}" class="delete-form">
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
                        <td>Non ci sono Red Wine in lista</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

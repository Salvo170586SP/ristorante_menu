@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="text-3xl my-9">Lista Special Long Drinks</h1>
            <a href="{{ url('admin') }}" class="btn btn-secondary shadow px-5 py-2">Torna alla dashboard</a>
        </div>


        <div class="col-12 col-sm d-sm-block d-md-none mt-4">
            <a href="{{ route('admin.special_long_drinks.create') }}" class="btn btn-primary px-5 py-2 shadow mb-3 my-3 ">Crea</a>
        </div>
        @include('includes.alert')
        {{-- MOBILE --}}
        @foreach($special_long_drinks as $special_long_drink)
        <div class="col-sm d-sm-block d-md-none my-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nome: {{ $special_long_drink->name }}</h5>
                    <p class="card-text">Prezzo: @if($special_long_drink->price) €{{ number_format($special_long_drink->price, 2, '.', ',')  }} @else -- @endif</p>
                    <p class="card-text">Descrizione: @if($special_long_drink->description) {{ $special_long_drink->description }} @else -- @endif</p>
                    <a href="{{ route('admin.special_long_drinks.show', $special_long_drink->id) }}" class="btn btn-primary shadow">Vedi</a>
                    <a href="{{ route('admin.special_long_drinks.edit', $special_long_drink->id) }}" class="btn btn-secondary shadow mx-2">Modifica</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalMobile-{{ $special_long_drink->id }}">
                        Elimina
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalMobile-{{ $special_long_drink->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5>Sei sicuro di eliminare {{ $special_long_drink->name }}?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                    <form action="{{ route('admin.special_long_drinks.destroy', $special_long_drink->id) }}" method="post">
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
            <a href="{{ route('admin.special_long_drinks.create') }}" class="btn btn-primary shadow mb-3 px-5 py-2">Crea</a>
            <h6>Totale dei prodotti in tabella: {{ count($special_long_drinks) }}</h6>
            <table class="table shadow">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Descrizione</th>
                        <th>Prezzo</th>
                        <th class="text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($special_long_drinks as $special_long_drink)
                    <tr>
                        <td>{{ $special_long_drink->id }}</td>
                        <td>{{ $special_long_drink->name }}</td>
                        <td>@if($special_long_drink->description) {{ $special_long_drink->description }} @else -- @endif</td>
                        <td>@if($special_long_drink->price) €{{ number_format($special_long_drink->price, 2, '.', ',') }} @else -- @endif</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('admin.special_long_drinks.show', $special_long_drink->id) }}" class="btn btn-primary shadow">Vedi</a>
                                <a href="{{ route('admin.special_long_drinks.edit', $special_long_drink->id) }}" class="btn btn-secondary shadow mx-2">Modifica</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $special_long_drink->id }}">
                                    Elimina
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $special_long_drink->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Sei sicuro di eliminare {{ $special_long_drink->name }}?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                <form action="{{ route('admin.special_long_drinks.destroy', $special_long_drink->id) }}" method="post" data-title="{{ $special_long_drink->name }}" class="delete-form">
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
                        <td>Non ci sono Special Long Drinks in lista</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

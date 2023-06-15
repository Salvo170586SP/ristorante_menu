@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="text-3xl my-9">Lista Whiskies</h1>
            <a href="{{ url('admin') }}" class="btn btn-secondary shadow px-5 py-2">Torna alla dashboard</a>
        </div>
        <div class="col-12 mt-5">
            @include('includes.alert')
            <a href="{{ route('admin.whiskies.create') }}" class="btn btn-primary shadow mb-3 px-5 py-2">Crea</a>
            <h6>Totale dei prodotti in tabella: {{ count($whiskies) }}</h6>
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
                    @forelse($whiskies as $whiskie)
                    <tr>
                        <td>{{ $whiskie->id }}</td>
                        <td>{{ $whiskie->name }}</td>
                        <td>@if($whiskie->description) {{ $whiskie->description }} @else -- @endif</td>
                        <td>@if($whiskie->price) €{{ $whiskie->price }} @else -- @endif</td>
                        <td>@if($whiskie->quantity_cl) {{ $whiskie->quantity_cl }}cl @else -- @endif</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('admin.whiskies.show', $whiskie->id) }}" class="btn btn-primary shadow">Vedi</a>
                                <a href="{{ route('admin.whiskies.edit', $whiskie->id) }}" class="btn btn-secondary shadow mx-2">Modifica</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $whiskie->id }}">
                                    Elimina
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $whiskie->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Sei sicuro di eliminare {{ $whiskie->name }}?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                <form action="{{ route('admin.whiskies.destroy', $whiskie->id) }}" method="post" data-title="{{ $whiskie->name }}" class="delete-form">
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
                        <td>Non ci sono Whiskies in lista</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 px-5 d-flex justify-content-between align-items-center">
            <h1>Lista Categorie</h1>
            <a href="{{ url('admin') }}" class="btn btn-secondary shadow px-5 py-2 ">Torna alla dashboard</a>
        </div>
        <div class="col-12 px-5 col-sm d-sm-block d-md-none mt-4">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary px-5 py-2 shadow mb-3 my-3 ">Crea</a>
        </div>
        @include('includes.alert')
        {{-- MOBILE --}}
        <div class="col-sm px-5 d-sm-block d-md-none">{{ $categories->onEachSide(1)->links() }}</div>
        @foreach($categories as $cat)
        <div class="col-sm d-sm-block px-5 d-md-none my-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Nome Categoria: {{ $cat->name_category }}</h5>
                    <h5 class="card-title mb-3">Nome Categoria Inglese: 
                        @if ($cat->name_category_eng)
                        {{ $cat->name_category_eng }}
                        @else
                        @endif
                    </h5>
                    <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-secondary mx-2">Modifica</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalMobile-{{ $cat->id }}">
                        Elimina
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalMobile-{{ $cat->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5>Sei sicuro di eliminare {{ $cat->name }}?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                    <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="post">
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
        <div class="col-12  d-none col-md-12 d-md-block mt-5 px-5">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary shadow mb-3 px-5 py-2">Crea</a>
            <table class="table shadow">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Nome Inglese</th>
                        <th class="text-end">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $cat)
                    <tr>
                        <td>{{ $cat->name_category }}</td>
                        <td>
                            @if ($cat->name_category_eng)
                            {{ $cat->name_category_eng }}
                            @else 
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-secondary  mx-2">Modifica</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $cat->id }}">
                                    Elimina
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $cat->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Sei sicuro di eliminare {{ $cat->name }}?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="post" data-title="{{ $cat->name }}" class="delete-form">
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
                        <td>Non ci sono categorie in lista</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="text-3xl my-9">Lista Birre</h1>
            <a href="{{ url('admin') }}" class="btn btn-secondary shadow text-white px-5 py-2">Torna alla dashboard</a>
        </div>
    </div>
    
    <div class="col-12 mt-5">
        <a href="{{ route('admin.beers.create') }}" class="btn btn-primary shadow text-white mb-3 px-5 py-2">Crea</a>
        <h6>Totale dei prodotti in tabella: {{ count($beers) }}</h6>
        <table class="table shadow">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>CL</th>
                    <th>Prezzo</th>
                    <th class="text-end">Azioni</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse($beers as $beer)
                <tr>
                    <td>{{ $beer->id }}</td>
                    <td>{{ $beer->name }}</td>
                    <td>@if($beer->description) {{ $beer->description }} @else -- @endif</td>
                    <td>@if($beer->cl) {{ $beer->cl }}cl @else -- @endif</td>
                    <td>@if($beer->price) €{{ $beer->price }} @else -- @endif</td>
                    <td>
                        <div class="flex justify-end">
                            <a href="{{ route('admin.beers.show', $beer->id) }}" class="rounded-lg shadow text-white p-2 bg-slate-500">Vedi</a>
                            <a href="{{ route('admin.beers.edit', $beer->id) }}" class="rounded-lg shadow text-white p-2 bg-cyan-700 mx-2">Modifica</a>
                            <form action="{{ route('admin.beers.destroy', $beer->id) }}" method="post" data-title="{{ $beer->name }}" class="delete-form">
                                @csrf
                                @method('delete')
                                <button class="rounded-lg shadow text-white p-2 bg-red-500">Elimina</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>Non ci sono birre in lista</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection


<script>
    const deleteForm = document.querySelectorAll('.delete-form');

    deleteForm.forEach(form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const title = form.getAttribute('data-title');
            const accept = confirm(`Sei sicuro di eliminare ${title}?`);

            if (accept) e.target.submit();
        })
    });

</script>

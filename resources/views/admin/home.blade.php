@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('La tua dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="text-center">
                        <h1 class="mb-3">Benvenuto {{ucfirst(Auth::user()->name)}}</h1>

                        <h5 class="mb-3">Le tue liste</h5>

                        <ol class="list-group d-flex justifu">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="fw-bold">LISTA</div>
                                <span>Elementi in lista</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="fw-bold"> <a class="btn btn-secondary" href="{{ route('admin.products.index') }}">Products</a></div>
                                <span class="badge bg-secondary rounded-pill">{{ count($products) }}</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

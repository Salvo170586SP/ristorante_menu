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
                                <div class="fw-bold"> <a class="btn btn-secondary" href="{{ route('admin.aperitifs.index') }}">Aperitifs</a></div>
                                <span class="badge bg-secondary rounded-pill">{{ count($aperitifs) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="fw-bold"><a class="btn btn-secondary" href="{{ route('admin.desserts.index') }}">Desserts</a></div>
                                <span class="badge bg-secondary rounded-pill">{{ count($desserts) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="fw-bold"><a class="btn btn-secondary" href="{{ route('admin.long_drinks.index') }}">Long Drinks</a> </div>
                                <span class="badge bg-secondary rounded-pill">{{ count($longDrinks) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="fw-bold"><a class="btn btn-secondary" href="{{ route('admin.special_long_drinks.index') }}">Special Long Drinks</a>
                                </div>
                                <span class="badge bg-secondary rounded-pill">{{ count($specialLongDrinks) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="fw-bold"><a class="btn btn-secondary" href="{{ route('admin.international_long_drinks.index') }}">International Long Drinks</a>
                                </div>
                                <span class="badge bg-secondary rounded-pill">{{ count($internationalLongDrinks) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="fw-bold"><a class="btn btn-secondary" href="{{ route('admin.white_wines.index') }}">White Wines</a></div>
                                <span class="badge bg-secondary rounded-pill">{{ count($whiteWines) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="fw-bold"><a class="btn btn-secondary" href="{{ route('admin.red_wines.index') }}">Red Wines</a></div>
                                <span class="badge bg-secondary rounded-pill">{{ count($redWines) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="fw-bold"><a class="btn btn-secondary" href="{{ route('admin.beers.index') }}">Beers</a></div>
                                <span class="badge bg-secondary rounded-pill">{{ count($beers) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="fw-bold"><a class="btn btn-secondary" href="{{ route('admin.bitter_drinks.index') }}">Amari</a></div>
                                <span class="badge bg-secondary rounded-pill">{{ count($bitterDrinks) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="fw-bold"><a class="btn btn-secondary" href="{{ route('admin.whiskies.index') }}">Whiskies</a></div>
                                <span class="badge bg-secondary rounded-pill">{{ count($whiskies) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="fw-bold"><a class="btn btn-secondary" href="{{ route('admin.soft_drinks.index') }}">Soft Drinks</a></div>
                                <span class="badge bg-secondary rounded-pill">{{ count($softDrinks) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="fw-bold"><a class="btn btn-secondary" href="{{ route('admin.bottles.index') }}">Bottles</a></div>
                                <span class="badge bg-secondary rounded-pill">{{ count($bottles) }}</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
                        <h1 class="mb-5">Benvenuto {{ Auth::user()->name }}</h1>
                        <a class="btn btn-secondary" href="{{ route('admin.aperitifs.index') }}">Aperitifs</a>
                        <a class="btn btn-secondary" href="{{ route('admin.desserts.index') }}">Desserts</a>
                        <a class="btn btn-secondary" href="{{ route('admin.long_drinks.index') }}">Long Drinks</a>
                        <a class="btn btn-secondary" href="{{ route('admin.special_long_drinks.index') }}">Special Long Drinks</a>
                        <a class="btn btn-secondary" href="{{ route('admin.international_long_drinks.index') }}">International Long Drinks</a>
                        <a class="btn btn-secondary" href="{{ route('admin.white_wines.index') }}">White Wines</a>
                        <a class="btn btn-secondary" href="{{ route('admin.red_wines.index') }}">Red Wines</a>
                        <a class="btn btn-secondary" href="{{ route('admin.beers.index') }}">Beers</a>
                        <a class="btn btn-secondary" href="{{ route('admin.bitter_drinks.index') }}">Amari</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

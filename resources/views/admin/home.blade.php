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

                    <div class="">
                        <h1>Benvenuto {{ Auth::user()->name }}</h1>
                        <a class="btn btn-secondary" href="{{ route('admin.aperitifs.index') }}">Aperitifs</a>
                        <a class="btn btn-secondary" href="{{ route('admin.beers.index') }}">Beers</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

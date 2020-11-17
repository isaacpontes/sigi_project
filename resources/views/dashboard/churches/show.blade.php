@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ $church->name }}</div>

                <div class="card-body">
                    <label>{{ $church->email }}</label><br>
                    <label>{{ $church->cnpj }}</label><br>
                    <label>{{ $church->phone }}</label><br>
                    <hr>
                    <a href="{{ route('home') }}">
                        <button type="button" class="btn btn-light float-right">Voltar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

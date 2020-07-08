@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ $event->name }}</div>

                <div class="card-body">
                    <label>Nome: {{ $event->name }}</label><br>
                    <label>Descrição: {{ $event->description }}</label><br>
                    <label>Data e Hora: {{ $event->happens_at }}</label><br>
                    <label>Responsável: {{ $event->member->name }}</label><br>
                    <label>Igreja: {{ $event->church->name }}</label><br>
                    <hr>
                    <a href="{{ route('dashboard.events.index') }}">
                        <button type="button" class="btn btn-light float-right">Voltar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

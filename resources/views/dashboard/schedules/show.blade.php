@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ $schedule->name }}</div>

                <div class="card-body">
                    <label>Nome: {{ $schedule->name }}</label><br>
                    <label>Data e Hora: {{ $schedule->happens_at }}</label><br>
                    <label>Outras Informações: {{ $schedule->add_info }}</label><br>
                    <hr>
                    <a href="{{ route('dashboard.schedules.index') }}">
                        <button type="button" class="btn btn-light float-right">Voltar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto bg-white col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $event->name }}</h1>
        </div>

        <div class="col-md-6">
            <label>
                <strong>Nome: </strong>
                {{ $event->name }}
            </label>
            <br>
            <label>
                <strong>Descrição: </strong>
                {{ $event->description }}
            </label>
            <br>
            <label>
                <strong>Data e Hora: </strong>
                {{ $event->happens_at }}
            </label>
            <br>
            <label>
                <strong>Responsável: </strong>
                {{ $event->member->name }}
            </label>
            <br>
            <hr>
            <a href="{{ route('dashboard.events.index') }}">
                <button type="button" class="btn btn-light float-right">Voltar</button>
            </a>
        </div>
    </main>
@endsection

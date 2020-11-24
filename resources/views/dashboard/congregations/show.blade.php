@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto bg-white col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $congregation->name }}</h1>
        </div>

        <div class="col-md-6">
            <label>
                <strong>Nome: </strong>
                {{ $congregation->name }}
            </label>
            <br>
            <label>
                <strong>Telefone: </strong>
                {{ $congregation->phone }}
            </label>
            <br>
            <label>
                <strong>Endereço: </strong>
                {{ $congregation->address }}
            </label>
            <br>
            <label>
                <strong>Informações Adicionais: </strong>
                {{ $congregation->add_info }}
            </label>
            <hr>
            <a href="{{ route('dashboard.congregations.index') }}">
                <button type="button" class="btn btn-light float-right">Voltar</button>
            </a>
        </div>
    </main>
</div>
@endsection

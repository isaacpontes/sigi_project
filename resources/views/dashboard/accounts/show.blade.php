@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto bg-white col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $account->name }}</h1>
        </div>

        <div class="col-md-6">
            <label><strong>Nome:</strong> {{ $account->name }}</label><br>
            <label><strong>Saldo Atual:</strong> R$ {{ number_format($account->balance/100, 2, ',', '.') }}</label><br>
            <label><strong>Informações Adicionais:</strong> {{ $account->add_info }}</label><br>
            <label><strong>Igreja:</strong> {{ $account->church->name }}</label><br>
            <hr>
            <a href="{{ route('dashboard.accounts.index') }}">
                <button type="button" class="btn btn-light float-right">Voltar</button>
            </a>
        </div>
    </main>
@endsection

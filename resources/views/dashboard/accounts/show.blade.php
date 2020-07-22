@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ $account->name }}</div>

                <div class="card-body">
                    <label><strong>Nome:</strong> {{ $account->name }}</label><br>
                    <label><strong>Saldo Atual:</strong> R$ {{ number_format($account->balance/100, 2, ',', '.') }}</label><br>
                    <label><strong>Informações Adicionais:</strong> {{ $account->add_info }}</label><br>
                    <label><strong>Igreja:</strong> {{ $account->church->name }}</label><br>
                    <hr>
                    <a href="{{ route('dashboard.accounts.index') }}">
                        <button type="button" class="btn btn-light float-right">Voltar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

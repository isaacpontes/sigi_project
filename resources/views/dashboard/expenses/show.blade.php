@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ $expense->name }}</div>

                <div class="card-body">
                    <label><strong>Nome: </strong> {{ $expense->name }}</label><br>
                    <label><strong>Valor: </strong> {{ number_format($expense->value/100, 2, ',', '.') }}</label><br>
                    <label><strong>Data: </strong> {{ $expense->ref_date }}</label><br>
                    <label><strong>Categoria: </strong> {{ $expense->expenseCategory->name }}</label><br>
                    <label><strong>Informações Adicionais: </strong> {{ $expense->add_info }}</label><br>
                    <label><strong>Igreja: </strong> {{ $expense->church->name }}</label><br>
                    <hr>
                    <a href="{{ route('dashboard.expenses.index') }}">
                        <button type="button" class="btn btn-light float-right">Voltar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

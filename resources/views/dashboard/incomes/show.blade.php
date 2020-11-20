@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ $income->name }}</div>

                <div class="card-body">
                    <label><strong>Nome: </strong> {{ $income->name }}</label><br>
                    <label><strong>Valor: </strong> {{ number_format($income->value/100, 2, ',', '.') }}</label><br>
                    <label><strong>Data: </strong> {{ $income->ref_date }}</label><br>
                    <label><strong>Categoria: </strong> {{ $income->incomeCategory->name }}</label><br>
                    @isset($income->member)
                        <label><strong>Membro: </strong> {{ $income->member->name }}</label><br>
                    @endisset
                    <label><strong>Informações Adicionais: </strong> {{ $income->add_info }}</label><br>
                    <label><strong>Igreja: </strong> {{ $income->church->name }}</label><br>
                    <hr>
                    <a href="{{ route('dashboard.incomes.index') }}">
                        <button type="button" class="btn btn-light float-right">Voltar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

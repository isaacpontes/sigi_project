@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto bg-white col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $income->name }}</h1>
        </div>

        <div class="col-md-6">
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
    </main>
@endsection

@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto bg-white col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Despesas</h1>
        </div>

        <a href="{{ route('dashboard.expenses.create') }}">
            <button type="button" class="btn btn-primary  mb-3">Adicionar Despesa</button>
        </a>

        <div class="table-responsive">

            <table class="table table-striped table-md">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Valor</th>
                <th scope="col">Data</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($expenses as $expense)
                <tr>
                <th scope="row">{{ $expense->id }}</th>
                <td>{{ $expense->name }}</td>
                <td>R$ {{ number_format($expense->value/100, 2, ',', '.') }}</td>
                <td>{{ $expense->ref_date }}</td>
                <td>
                    <a href="{{ route('dashboard.expenses.show', $expense->id) }}">
                        <button type="button" class="btn btn-sm btn-secondary mr-2 float-left">Detalhes</button>
                    </a>
                    <a href="{{ route('dashboard.expenses.edit', $expense->id) }}">
                        <button type="button" class="btn btn-sm btn-light mr-2 float-left">Editar</button>
                    </a>
                    <form action="{{ route('dashboard.expenses.destroy', $expense) }}" method="post" class="float-left">
                        @csrf
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
                </tr>
            @endforeach
            </tbody>
            </table>


        </div>
    </main>
@endsection

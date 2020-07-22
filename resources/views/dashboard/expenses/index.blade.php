@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Despesas</div>

        <div class="card-body">

          <table class="table">
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
              <td>
                <a href="{{ route('dashboard.expenses.show', $expense->id) }}">
                  {{ $expense->name }}
                </a>
              </td>
              <td>R$ {{ number_format($expense->value/100, 2, ',', '.') }}</td>
              <td>{{ $expense->ref_date }}</td>
              <td>
                <a href="{{ route('dashboard.expenses.show', $expense->id) }}">
                    <button type="button" class="btn btn-sm btn-info float-left">Detalhes</button>
                </a>
                <a href="{{ route('dashboard.expenses.edit', $expense->id) }}">
                  <button type="button" class="btn btn-sm btn-warning float-left">Editar</button>
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

          <a href="{{ route('dashboard.expenses.create') }}">
            <button type="button" class="btn btn-primary float-right">Adicionar Despesa</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

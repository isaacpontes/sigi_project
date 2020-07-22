@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Receitas</div>

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
          @foreach($incomes as $income)
            <tr>
              <th scope="row">{{ $income->id }}</th>
              <td>
                <a href="{{ route('dashboard.incomes.show', $income->id) }}">
                  {{ $income->name }}
                </a>
              </td>
              <td>R$ {{ number_format($income->value/100, 2, ',', '.') }}</td>
              <td>{{ $income->ref_date }}</td>
              <td>
                <a href="{{ route('dashboard.incomes.show', $income->id) }}">
                    <button type="button" class="btn btn-sm btn-info float-left">Detalhes</button>
                </a>
                <a href="{{ route('dashboard.incomes.edit', $income->id) }}">
                  <button type="button" class="btn btn-sm btn-warning float-left">Editar</button>
                </a>
                <form action="{{ route('dashboard.incomes.destroy', $income) }}" method="post" class="float-left">
                  @csrf
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
          </table>

          <a href="{{ route('dashboard.incomes.create') }}">
            <button type="button" class="btn btn-primary float-right">Adicionar Receita</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

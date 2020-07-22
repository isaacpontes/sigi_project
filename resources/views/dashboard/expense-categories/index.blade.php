@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Categorias de Despesas</div>

        <div class="card-body">

          <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
          @foreach($expense_categories as $expense_category)
            <tr>
              <th scope="row">{{ $expense_category->id }}</th>
              <td>
                <a href="{{ route('dashboard.expense_categories.show', $expense_category->id) }}">
                  {{ $expense_category->name }}
                </a>
              </td>
              <td>
                <a href="{{ route('dashboard.expense_categories.show', $expense_category->id) }}">
                    <button type="button" class="btn btn-sm btn-info float-left">Detalhes</button>
                </a>
                <a href="{{ route('dashboard.expense_categories.edit', $expense_category->id) }}">
                  <button type="button" class="btn btn-sm btn-warning float-left">Editar</button>
                </a>
                <form action="{{ route('dashboard.expense_categories.destroy', $expense_category) }}" method="post" class="float-left">
                  @csrf
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
          </table>

          <a href="{{ route('dashboard.expense_categories.create') }}">
            <button type="button" class="btn btn-primary float-right">Adicionar Categoria</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

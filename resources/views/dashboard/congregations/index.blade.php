@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Congregações</div>

                <div class="card-body">

                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Telefone</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($congregations as $congregation)
                    <tr>
                      <th scope="row">{{ $congregation->id }}</th>
                      <td>
                        <a href="{{ route('dashboard.congregations.show', $congregation->id) }}">
                          {{ $congregation->name }}
                        </a>
                      </td>
                      <td>{{ $congregation->phone }}</td>
                      <td>
                        <a href="{{ route('dashboard.congregations.show', $congregation->id) }}">
                            <button type="button" class="btn btn-sm btn-info float-left">Detalhes</button>
                        </a>
                        <a href="{{ route('dashboard.congregations.edit', $congregation->id) }}">
                          <button type="button" class="btn btn-sm btn-warning float-left">Editar</button>
                        </a>
                        <form action="{{ route('dashboard.congregations.destroy', $congregation) }}" method="post" class="float-left">
                          @csrf
                          {{ method_field('delete') }}
                          <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                  </table>

                  <a href="{{ route('dashboard.congregations.create') }}"><button type="button" class="btn btn-primary float-right">Cadastrar Congregação</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

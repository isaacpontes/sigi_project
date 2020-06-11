@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Igrejas</div>

                <div class="card-body">

                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col">E-Mail</th>
                      <th scope="col">Usuários</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($churches as $church)
                    <tr>
                      <th scope="row">{{ $church->id }}</th>
                      <td><a href="{{ route('dashboard.churches.show', $church->id) }}">{{ $church->name }}</a></td>
                      <td>{{ $church->email }}</td>
                      <td>{{ implode(', ', $church->users()->get()->pluck('name')->toArray()) }}</td>
                      <td>
                        <a href="{{ route('dashboard.churches.show', $church->id) }}">
                            <button type="button" class="btn btn-sm btn-info float-left">Detalhes</button>
                        </a>
                        <a href="{{ route('dashboard.churches.edit', $church->id) }}">
                          <button type="button" class="btn btn-sm btn-warning float-left">Editar</button>
                        </a>
                        <form action="{{ route('dashboard.churches.destroy', $church) }}" method="post" class="float-left">
                          @csrf
                          {{ method_field('delete') }}
                          <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                  </table>

                  <a href="{{ route('dashboard.churches.create') }}"><button type="button" class="btn btn-primary float-right">Cadastrar Igreja</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

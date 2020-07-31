@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfis de Permissão</div>

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
                  @foreach($roles as $role)
                    <tr>
                      <th scope="row">{{ $role->id }}</th>
                      <td>{{ $role->name }}</td>
                      <td>
                        <a href="{{ route('dashboard.roles.edit', $role->id) }}">
                          <button type="button" class="btn btn-sm btn-warning float-left">Editar</button>
                        </a>
                        <form action="{{ route('dashboard.roles.destroy', $role) }}" method="post" class="float-left">
                          @csrf
                          {{ method_field('delete') }}
                          <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                  </table>

                  <a href="{{ route('dashboard.roles.create') }}"><button type="button" class="btn btn-primary float-right">Adicionar Perfil</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

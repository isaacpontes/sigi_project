@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Usuários</div>

                <div class="card-body">

                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col">E-Mail</th>
                      <th scope="col">Permissões</th>
                      <th scope="col">Igreja</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                    <tr>
                      <th scope="row">{{ $user->id }}</th>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                      <td>{{ $user->church->name }}</td>
                      <td>
                        <a href="{{ route('dashboard.users.show', $user->id) }}">
                            <button type="button" class="btn btn-sm btn-info float-left">Detalhes</button>
                        </a>
                        <a href="{{ route('dashboard.users.edit', $user->id) }}">
                          <button type="button" class="btn btn-sm btn-warning float-left">Editar</button>
                        </a>
                        <form action="{{ route('dashboard.users.destroy', $user) }}" method="post" class="float-left">
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
            </div>
        </div>
    </div>
</div>
@endsection

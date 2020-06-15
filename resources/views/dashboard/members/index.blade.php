@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Membros</div>

                <div class="card-body">

                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Telefone</th>
                      <th scope="col">Email</th>
                      <th scope="col">Congregação</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($members as $member)
                    <tr>
                      <th scope="row">{{ $member->id }}</th>
                      <td>
                        <a href="{{ route('dashboard.members.show', $member->id) }}">
                          {{ $member->name }}
                        </a>
                      </td>
                      <td>{{ $member->phone }}</td>
                      <td>{{ $member->email }}</td>
                      <td>{{ $member->congregation->name }}</td>
                      <td>
                        <a href="{{ route('dashboard.members.show', $member->id) }}">
                            <button type="button" class="btn btn-sm btn-info float-left">Detalhes</button>
                        </a>
                        <a href="{{ route('dashboard.members.edit', $member->id) }}">
                          <button type="button" class="btn btn-sm btn-warning float-left">Editar</button>
                        </a>
                        <form action="{{ route('dashboard.members.destroy', $member) }}" method="post" class="float-left">
                          @csrf
                          {{ method_field('delete') }}
                          <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                  </table>

                  <a href="{{ route('dashboard.members.create') }}"><button type="button" class="btn btn-primary float-right">Cadastrar Membro</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

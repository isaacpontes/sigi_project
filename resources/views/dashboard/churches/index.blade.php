@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                      <th scope="col">CNPJ</th>
                      <th scope="col">Telefone</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($churches as $church)
                    <tr>
                      <th scope="row">{{ $church->id }}</th>
                      <td>{{ $church->name }}</td>
                      <td>{{ $church->email }}</td>
                      <td>{{ implode(', ', $church->users()->get()->pluck('name')->toArray()) }}</td>
                      <td>{{ $church->cnpj }}</td>
                      <td>{{ $church->phone }}</td>
                      <td>
                        <a href="{{ route('dashboard.churches.edit', $church->id) }}"><button type="button" class="btn btn-warning float-left">Editar</button></a>
                        <form action="{{ route('dashboard.churches.destroy', $church) }}" method="post" class="float-left">
                          @csrf
                          {{ method_field('delete') }}
                          <button type="submit" class="btn btn-danger">Excluir</button>
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

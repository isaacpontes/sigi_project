@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contas</div>

                <div class="card-body">

                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Conta</th>
                      <th scope="col">Saldo Atual</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($accounts as $account)
                    <tr>
                      <th scope="row">{{ $account->id }}</th>
                      <td>
                        <a href="{{ route('dashboard.accounts.show', $account->id) }}">
                          {{ $account->name }}
                        </a>
                      </td>
                      <td> R$ {{ number_format($account->balance/100, 2, ',', '.') }} </td>
                      <td>
                        <a href="{{ route('dashboard.accounts.show', $account->id) }}">
                            <button type="button" class="btn btn-sm btn-info float-left">Detalhes</button>
                        </a>
                        <a href="{{ route('dashboard.accounts.edit', $account->id) }}">
                          <button type="button" class="btn btn-sm btn-warning float-left">Editar</button>
                        </a>
                        <form action="{{ route('dashboard.accounts.destroy', $account) }}" method="post" class="float-left">
                          @csrf
                          {{ method_field('delete') }}
                          <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                  </table>

                  <a href="{{ route('dashboard.accounts.create') }}"><button type="button" class="btn btn-primary float-right">Adicionar Conta</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

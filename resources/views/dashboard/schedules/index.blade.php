@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Compromissos</div>

                <div class="card-body">

                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Data e Hora</th>
                      <th scope="col">Completado?</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($schedules as $schedule)
                    <tr>
                      <th scope="row">{{ $schedule->id }}</th>
                      <td>
                        <a href="{{ route('dashboard.schedules.show', $schedule->id) }}">
                          {{ $schedule->name }}
                        </a>
                      </td>
                      <td>{{ $schedule->happens_at }}</td>
                      <td>{{ $schedule->completed }}</td>
                      <td>
                        <a href="{{ route('dashboard.schedules.show', $schedule->id) }}">
                            <button type="button" class="btn btn-sm btn-info float-left">Detalhes</button>
                        </a>
                        <a href="{{ route('dashboard.schedules.edit', $schedule->id) }}">
                          <button type="button" class="btn btn-sm btn-warning float-left">Editar</button>
                        </a>
                        <form action="{{ route('dashboard.schedules.destroy', $schedule) }}" method="post" class="float-left">
                          @csrf
                          {{ method_field('delete') }}
                          <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                  </table>

                  <a href="{{ route('dashboard.schedules.create') }}"><button type="button" class="btn btn-primary float-right">Adicionar Compromisso</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

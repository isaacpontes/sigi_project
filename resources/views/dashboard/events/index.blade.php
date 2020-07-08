@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Eventos</div>

                <div class="card-body">

                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Data e Hora</th>
                      <th scope="col">Responsável</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($events as $event)
                    <tr>
                      <th scope="row">{{ $event->id }}</th>
                      <td>
                        <a href="{{ route('dashboard.events.show', $event->id) }}">
                          {{ $event->name }}
                        </a>
                      </td>
                      <td>{{ $event->happens_at }}</td>
                      <td>{{ $event->member->name }}</td>
                      <td>
                        <a href="{{ route('dashboard.events.show', $event->id) }}">
                            <button type="button" class="btn btn-sm btn-info float-left">Detalhes</button>
                        </a>
                        <a href="{{ route('dashboard.events.edit', $event->id) }}">
                          <button type="button" class="btn btn-sm btn-warning float-left">Editar</button>
                        </a>
                        <form action="{{ route('dashboard.events.destroy', $event) }}" method="post" class="float-left">
                          @csrf
                          {{ method_field('delete') }}
                          <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                  </table>

                  <a href="{{ route('dashboard.events.create') }}"><button type="button" class="btn btn-primary float-right">Cadastrar Evento</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

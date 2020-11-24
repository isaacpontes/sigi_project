@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto bg-white col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Compromissos</h1>
        </div>

        <a href="{{ route('dashboard.appointments.create') }}"><button type="button" class="btn btn-primary mb-3">Adicionar Compromisso</button></a>

        <div class="table-responsive">

            <table class="table table-striped table-md">
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
            @foreach($appointments as $appointment)
            <tr>
                <th scope="row">{{ $appointment->id }}</th>
                <td>{{ $appointment->name }}</td>
                <td>{{ $appointment->happens_at }}</td>
                <td>{{ $appointment->completed }}</td>
                <td>
                <a href="{{ route('dashboard.appointments.show', $appointment->id) }}">
                    <button type="button" class="btn btn-sm btn-secondary mr-2 float-left">Detalhes</button>
                </a>
                <a href="{{ route('dashboard.appointments.edit', $appointment->id) }}">
                    <button type="button" class="btn btn-sm btn-light mr-2 float-left">Editar</button>
                </a>
                <form action="{{ route('dashboard.appointments.destroy', $appointment) }}" method="post">
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
    </main>
@endsection

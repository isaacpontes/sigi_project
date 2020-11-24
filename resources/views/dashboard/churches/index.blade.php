@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto bg-white col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Igrejas</h1>
        </div>

        <a href="{{ route('dashboard.churches.create') }}"><button type="button" class="btn btn-primary mb-3">Cadastrar Igreja</button></a>

        <div class="table-responsive">

            <table class="table table-striped table-md">
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
                    <td>{{ $church->name }}</td>
                    <td>{{ $church->email }}</td>
                    <td>{{ implode(', ', $church->users()->get()->pluck('name')->toArray()) }}</td>
                    <td>
                    <a href="{{ route('dashboard.churches.show', $church->id) }}">
                        <button type="button" class="btn btn-sm btn-secondary mr-2 float-left">Detalhes</button>
                    </a>
                    <a href="{{ route('dashboard.churches.edit', $church->id) }}">
                        <button type="button" class="btn btn-sm btn-light mr-2 float-left">Editar</button>
                    </a>
                    <form action="{{ route('dashboard.churches.destroy', $church) }}" method="post">
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

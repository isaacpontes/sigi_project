@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto bg-white col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Membros</h1>
        </div>

        <a href="{{ route('dashboard.members.create') }}"><button type="button" class="btn btn-primary mb-3">Cadastrar Membro</button></a>

        <div class="table-responsive">
            <table class="table table-striped table-md">
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
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->congregation->name }}</td>
                    <td>
                    <a href="{{ route('dashboard.members.show', $member->id) }}">
                        <button type="button" class="btn btn-sm btn-secondary mr-2 float-left">Detalhes</button>
                    </a>
                    <a href="{{ route('dashboard.members.edit', $member->id) }}">
                        <button type="button" class="btn btn-sm btn-light mr-2 float-left">Editar</button>
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

            </div>
        </div>
    </main>
@endsection

<x-app-layout>
    <x-slot name="header">
        {{ __('Congregations') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('dashboard.congregations.create') }}"><button type="button" class="btn btn-primary mb-3">Cadastrar Congregação</button></a>

    <div class="table-responsive">

        <table class="table table-striped table-md">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($congregations as $congregation)
        <tr>
            <th scope="row">{{ $congregation->id }}</th>
            <td>{{ $congregation->name }}</td>
            <td>{{ $congregation->phone }}</td>
            <td>
            <a href="{{ route('dashboard.congregations.show', $congregation->id) }}">
                <button type="button" class="btn btn-sm btn-secondary mr-2 float-left">Detalhes</button>
            </a>
            <a href="{{ route('dashboard.congregations.edit', $congregation->id) }}">
                <button type="button" class="btn btn-sm btn-light mr-2 float-left">Editar</button>
            </a>
            <form action="{{ route('dashboard.congregations.destroy', $congregation) }}" method="post" class="float-left">
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

</x-app-layout>

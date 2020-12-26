<x-app-layout>
    <x-slot name="header">
        {{ __('Roles') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('dashboard.roles.create') }}"><button type="button" class="btn btn-primary mb-3">Adicionar Perfil</button></a>

    <div class="table-responsive">

        <table class="table table-striped table-md">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
        <tr>
            <th scope="row">{{ $role->id }}</th>
            <td>{{ $role->name }}</td>
            <td>
            <a href="{{ route('dashboard.roles.edit', $role->id) }}">
                <button type="button" class="btn btn-sm btn-light mr-2 float-left">Editar</button>
            </a>
            <form action="{{ route('dashboard.roles.destroy', $role) }}" method="post">
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

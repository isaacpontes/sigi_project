<x-app-layout>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="table-responsive">

        <table class="table   ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-Mail</th>
                <th scope="col">Igreja</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->church->name }}</td>
                <td>
                <a href="{{ route('dashboard.users.show', $user->id) }}">
                    <button type="button" class="btn btn-sm btn-info float-left">Detalhes</button>
                </a>
                <a href="{{ route('dashboard.users.edit', $user->id) }}">
                    <button type="button" class="btn btn-sm btn-warning float-left">Editar</button>
                </a>
                <form action="{{ route('dashboard.users.destroy', $user) }}" method="post" class="float-left">
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

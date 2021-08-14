<x-app-layout>
    <x-slot name="header">
        {{ __('Churches') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('dashboard.churches.create') }}"><button type="button" class="btn btn-primary mb-3">Cadastrar Igreja</button></a>

    <div class="table-responsive">

        <table class="table">
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
                            <button type="button" class="btn btn-sm btn-secondary me-2 float-left">Detalhes</button>
                        </a>
                        <a href="{{ route('dashboard.churches.edit', $church->id) }}">
                            <button type="button" class="btn btn-sm btn-light me-2 float-left">Editar</button>
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

</x-app-layout>

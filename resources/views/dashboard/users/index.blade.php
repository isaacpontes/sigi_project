<x-app-layout>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('dashboard.users.create') }}">
        <button type="button" class="btn btn-primary mb-3">Adicionar Usuário</button>
    </a>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Admin.</th>
                    <th scope="col">Secret.</th>
                    <th scope="col">Tesour.</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->church_admin)
                                <span class="text-success ms-3"><i class="fas fa-check-circle fa-fw"></i></span> 
                            @else
                                <span class="text-danger ms-3"><i class="fas fa-times-circle fa-fw"></i></span>
                            @endif
                        </td>
                        <td>
                            @if ($user->members_admin)
                                <span class="text-success ms-3"><i class="fas fa-check-circle fa-fw"></i></span> 
                            @else
                                <span class="text-danger ms-3"><i class="fas fa-times-circle fa-fw"></i></span>
                            @endif
                        </td>
                        <td>
                            @if ($user->finances_admin)
                                <span class="text-success ms-3"><i class="fas fa-check-circle fa-fw"></i></span> 
                            @else
                                <span class="text-danger ms-3"><i class="fas fa-times-circle fa-fw"></i></span>
                            @endif
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('dashboard.users.edit', $user->id) }}">
                                <button type="button" class="btn btn-outline-secondary me-2 py-0">
                                    Editar
                                </button>
                            </a>
                            <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="post" class="float-left">
                                @csrf
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-outline-danger me-2 py-0">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>

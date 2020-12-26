<x-app-layout>
    <x-slot name="header">
        {{ __('Accounts') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('dashboard.accounts.create') }}"><button type="button" class="btn btn-primary mb-3">Adicionar Conta</button></a>

    <div class="table-responsive">

        <table class="table table-striped table-md">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Conta</th>
            <th scope="col">Saldo Atual</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
        <tr>
            <th scope="row">{{ $account->id }}</th>
            <td>{{ $account->name }}</td>
            <td> R$ {{ number_format($account->balance/100, 2, ',', '.') }} </td>
            <td>
            <a href="{{ route('dashboard.accounts.show', $account->id) }}">
                <button type="button" class="btn btn-sm btn-secondary float-left mr-2">Detalhes</button>
            </a>
            <a href="{{ route('dashboard.accounts.edit', $account->id) }}">
                <button type="button" class="btn btn-sm btn-light float-left mr-2">Editar</button>
            </a>
            <form action="{{ route('dashboard.accounts.destroy', $account) }}" method="post">
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

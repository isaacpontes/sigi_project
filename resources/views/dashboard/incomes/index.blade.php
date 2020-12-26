<x-app-layout>
    <x-slot name="header">
        {{ __('Incomes') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('dashboard.incomes.create') }}">
        <button type="button" class="btn btn-primary mb-3">Adicionar Receita</button>
    </a>

    <div class="table-responsive">

        <table class="table table-striped table-md">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Valor</th>
            <th scope="col">Data</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($incomes as $income)
            <tr>
            <th scope="row">{{ $income->id }}</th>
            <td>{{ $income->name }}</td>
            <td>R$ {{ number_format($income->value/100, 2, ',', '.') }}</td>
            <td>{{ $income->ref_date }}</td>
            <td>
                <a href="{{ route('dashboard.incomes.show', $income->id) }}">
                    <button type="button" class="btn btn-sm btn-secondary mr-2 float-left">Detalhes</button>
                </a>
                <a href="{{ route('dashboard.incomes.edit', $income->id) }}">
                    <button type="button" class="btn btn-sm btn-light mr-2 float-left">Editar</button>
                </a>
                <form action="{{ route('dashboard.incomes.destroy', $income) }}" method="post" class="float-left">
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

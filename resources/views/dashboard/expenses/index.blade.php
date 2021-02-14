<x-app-layout>
    <x-slot name="header">
        {{ __('Expenses') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('dashboard.finances.expenses.create') }}">
        <button type="button" class="btn btn-primary  mb-3">Adicionar Despesa</button>
    </a>

    <div class="table-responsive">
        <table class="table table-striped table-md">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Data</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                    <tr>
                        <td>{{ $expense->name }}</td>
                        <td>R$ {{ number_format($expense->value/100, 2, ',', '.') }}</td>
                        <td>{{ date("d/m/Y", strtotime($expense->ref_date)) }}</td>
                        <td>{{ $expense->category }}</td>
                        <td class="d-flex">
                            <a href="{{ route('dashboard.finances.expenses.show', $expense->id) }}">
                                <button type="button" class="btn btn-outline-primary mr-2 py-0">
                                    <span>
                                    {{ __('Details') }}
                                    </span>
                                </button>
                            </a>
                            <a href="{{ route('dashboard.finances.expenses.edit', $expense->id) }}">
                                <button type="button" class="btn btn-outline-secondary mr-2 py-0">
                                    <span>
                                    {{ __('Edit') }}
                                    </span>
                                </button>
                            </a>
                            <form action="{{ route('dashboard.finances.expenses.destroy', $expense->id) }}" method="post" class="float-left">
                                @csrf
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-outline-danger mr-2 py-0">
                                    <span>
                                    {{ __('Delete') }}
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>

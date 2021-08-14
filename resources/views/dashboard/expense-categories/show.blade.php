<x-app-layout>
    <x-slot name="header">
        {{ __('Expense Category') . " - " . $expense_category->name }}
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5>Despesas Nesta Categoria</h5>
            <div class="table-responsive">
                <table class="table  ">
                    <thead>
                        <th scope="col">Nome</th>
                        <th scope="col">Data</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ações</th>
                    </thead>
                    <tbody>
                        @foreach ($expenses as $expense)
                            <tr>
                                <td>{{ $expense->name }}</td>
                                <td>{{ date("d/m/Y", strtotime($expense->ref_date)) }}</td>
                                <td>R$ {{ number_format($expense->value/100, 2, ',', '.') }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('dashboard.finances.expenses.show', $expense->id) }}">
                                      <button type="button" class="btn btn-outline-info me-2 py-0">
                                        <span>
                                          {{ __('Details') }}
                                        </span>
                                      </button>
                                    </a>
                                    <a href="{{ route('dashboard.finances.expenses.edit', $expense->id) }}">
                                      <button type="button" class="btn btn-outline-secondary me-2 py-0">
                                        <span>
                                          {{ __('Edit') }}
                                        </span>
                                      </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $expenses->links() }}
            </div>
            <hr>
            <a href="{{ route('dashboard.finances.categories') }}">
                <button type="button" class="btn btn-primary">Voltar</button>
            </a>
        </div>
    </div>

</x-app-layout>

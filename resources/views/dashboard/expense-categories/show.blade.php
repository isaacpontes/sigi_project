<x-app-layout>
    <x-slot name="header">
        {{ __('Expense Category') . " - " . $expense_category->name }}
    </x-slot>

    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped">
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
                                <a href="{{ route('dashboard.expenses.show', $expense->id) }}">
                                  <button type="button" class="btn btn-outline-primary mr-2 py-0">
                                    <span>
                                      {{ __('Details') }}
                                    </span>
                                  </button>
                                </a>
                                <a href="{{ route('dashboard.expenses.edit', $expense->id) }}">
                                  <button type="button" class="btn btn-outline-secondary mr-2 py-0">
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
        <a href="{{ route('dashboard.finance-categories') }}">
            <button type="button" class="btn btn-primary">Voltar</button>
        </a>
    </div>

</x-app-layout>

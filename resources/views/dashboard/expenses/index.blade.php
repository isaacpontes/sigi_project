<x-app-layout>
    <x-slot name="header">
        {{ __('Expenses') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-7 d-flex align-items-center justify-content-start mb-4">
                    <h3 class="card-title pt-2 pe-4">{{ __('All Expenses') }}</h3>
                    <a href="{{ route('dashboard.finances.expenses.create') }}" class="btn btn-primary">{{ __('Add Expense') }}</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table   ">
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
                                    <form
                                        action="{{ route('dashboard.finances.expenses.destroy', $expense->id) }}"
                                        method="post"
                                        class="delete-confirmation float-left"
                                    >
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-outline-danger me-2 py-0">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        {{ __('All Incomes') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('dashboard.finances.incomes.create') }}">
        <button type="button" class="btn btn-primary mb-3">Adicionar Receita</button>
    </a>

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
                @foreach($incomes as $income)
                    <tr>
                        <td>{{ $income->name }}</td>
                        <td>R$ {{ number_format($income->value/100, 2, ',', '.') }}</td>
                        <td>{{ date("d/m/Y", strtotime($income->ref_date)) }}</td>
                        <td>{{ $income->category }}</td>
                        <td class="d-flex">
                            <a href="{{ route('dashboard.finances.incomes.show', $income->id) }}">
                                <button type="button" class="btn btn-outline-primary me-2 py-0">
                                    <span>
                                    {{ __('Details') }}
                                    </span>
                                </button>
                            </a>
                            <a href="{{ route('dashboard.finances.incomes.edit', $income->id) }}">
                                <button type="button" class="btn btn-outline-secondary me-2 py-0">
                                    <span>
                                    {{ __('Edit') }}
                                    </span>
                                </button>
                            </a>
                            <form action="{{ route('dashboard.finances.incomes.destroy', $income->id) }}" method="post" class="float-left">
                                @csrf
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-outline-danger me-2 py-0">
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
        {{ $incomes->links() }}
    </div>

</x-app-layout>

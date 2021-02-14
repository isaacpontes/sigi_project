<x-app-layout>
    <x-slot name="header">
        {{ __('Income Category') . " - " . $income_category->name }}
    </x-slot>

    <div class="col-md-12">
        <h3>Receitas Nesta Categoria</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th scope="col">Nome</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Ações</th>
                </thead>
                <tbody>
                    @foreach ($incomes as $income)
                        <tr>
                            <td>{{ $income->name }}</td>
                            <td>{{ date("d/m/Y", strtotime($income->ref_date)) }}</td>
                            <td>R$ {{ number_format($income->value/100, 2, ',', '.') }}</td>
                            <td class="d-flex">
                                <a href="{{ route('dashboard.finances.incomes.show', $income->id) }}">
                                  <button type="button" class="btn btn-outline-primary mr-2 py-0">
                                    <span>
                                      {{ __('Details') }}
                                    </span>
                                  </button>
                                </a>
                                <a href="{{ route('dashboard.finances.incomes.edit', $income->id) }}">
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
            {{ $incomes->links() }}
        </div>
        <hr>
        <a href="{{ route('dashboard.finances.categories') }}">
            <button type="button" class="btn btn-primary">Voltar</button>
        </a>
    </div>

</x-app-layout>

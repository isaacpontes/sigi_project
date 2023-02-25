<x-app-layout>

  <x-slot name="header">
      {{ __('Account') . " - " . $account->name }}
  </x-slot>

  <div class="row">
    <div class="col-sm-4">
      <div class="mb-3">
        <h5> {{ __('Name') }}: </h5>
        <label>{{ $account->name }}</label>
      </div>
      <div class="mb-3">
        <h5> {{ __('Balance') }}: </h5>
        <label>R$ {{ number_format($account->balance/100, 2, ',', '.') }}</label>
      </div>
      <div class="mb-3">
        <h5> {{ __('Additional Information') }}: </h5>
        <p>{{ $account->add_info }}</p>
      </div>
      <hr>
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('dashboard.finances.accounts.index') }}">
          <button type="button" class="btn btn-primary">Voltar</button>
        </a>
        <div class="btn-group me-3">
          <a href="{{ route('dashboard.finances.accounts.individual-resume', $account) }}" class="btn btn-outline-secondary">
            Imprimir Resumo
          </a>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
        <div class="card mb-4">
            <div class="card-header">Últimos Lancamentos</div>
            <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <h5>Entradas</h5>
                    <div class="table-responsive">
                      <table class="table  ">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Valor</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($incomes as $income)
                            <tr>
                              <td>{{ $income->name }}</td>
                              <td>R$ {{ number_format($income->value/100, 2, ',', '.') }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <h5>Saídas</h5>
                    <div class="table-responsive">
                      <table class="table  ">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Valor</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($expenses as $expense)
                            <tr>
                              <td>{{ $expense->name }}</td>
                              <td>R$ {{ number_format($expense->value/100, 2, ',', '.') }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="pb-3 d-flex justify-content-end align-items-center">
                      <a href="{{ route('dashboard.finances.incomes.index') }}" class="btn btn-primary">{{ __('All Incomes') }}</a>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="pb-3 d-flex justify-content-end align-items-center">
                      <a href="{{ route('dashboard.finances.expenses.index') }}" class="btn btn-primary">{{ __('All Expenses') }}</a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>

</x-app-layout>


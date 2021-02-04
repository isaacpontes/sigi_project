<x-app-layout>

  <x-slot name="header">
      {{ __('Account') . " - " . $account->name }}
  </x-slot>

  <div class="row">
    <div class="col-md-3 ml-3">
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
        <a href="{{ route('dashboard.accounts.index') }}">
          <button type="button" class="btn btn-sm btn-secondary">Voltar</button>
        </a>
        <div class="btn-group me-3">
          <a href="{{ route('dashboard.accounts.individual-resume', $account) }}" class="btn btn-sm btn-outline-secondary">
            Imprimir Resumo
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <h3 class="mb-3">Últimos Lancamentos</h3>
      <div class="row">
        <div class="col-sm-6">
          <h5>Entradas</h5>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Data</th>
                  <th>Valor</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($incomes as $income)
                  <tr>
                    <td><a href="{{ route('dashboard.incomes.show', $income->id) }}">{{ $income->name }}</a></td>
                    <td>{{ date("d/m/Y", strtotime($income->ref_date)) }}</td>
                    <td>{{ number_format($income->value/100, 2, ',', '.') }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-sm-6">
          <h5>Saídas</h5>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Data</th>
                  <th>Valor</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($expenses as $expense)
                  <tr>
                    <td><a href="{{ route('dashboard.expenses.show', $expense->id) }}">{{ $expense->name }}</a></td>
                    <td>{{ date("d/m/Y", strtotime($expense->ref_date)) }}</td>
                    <td>{{ number_format($expense->value/100, 2, ',', '.') }}</td>
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
            <a href="{{ route('dashboard.incomes.index') }}" class="btn btn-sm btn-outline-primary">{{ __('More Incomes') }}</a>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="pb-3 d-flex justify-content-end align-items-center">
            <a href="{{ route('dashboard.expenses.index') }}" class="btn btn-sm btn-outline-primary">{{ __('More Expenses') }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>


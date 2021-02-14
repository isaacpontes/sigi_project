<x-app-layout>
  <x-slot name="header">
    {{ __('Accounts') }}
  </x-slot>

  @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  @endif

  <div class="row">
    <div class="col-sm-4">
      <h3 class="my-1">Resumo</h3>

      <div class="my-3 me-5">
        <h5>
          Saldo Total:
          R$ {{ number_format($total_balance, 2, ',', '.') }}
        </h5>
      </div>

      <div class="my-3 me-5">
        <h5 class="mb-0"> {{ __('Current Month') }} ({{ date("m/Y") }})</h5>
        <div class="mt-1 d-flex justify-content-between">
          <div>Entradas:</div>
          <div>R$ {{ number_format($current_month_incomes, 2, ',', '.') }}</div>
        </div>
        <div class="d-flex justify-content-between">
          <div>Saídas:</div>
          <div>R$ {{ number_format($current_month_expenses, 2, ',', '.') }}</div>
        </div>
        <div class="d-flex justify-content-between">
          <div>Balanço:</div>
          <div class="@if ($current_month_balance > 0) text-success @else text-danger @endif"> R$ {{ number_format($current_month_balance, 2, ',', '.') }}</div>
        </div>
      </div>

      <div class="my-3 me-5">
        <h5 class="mb-0"> {{ __('Last Month') }} ({{ date("m/Y", strtotime("-1 month")) }})</h5>
        <div class="mt-1 d-flex justify-content-between">
          <div>Entradas:</div>
          <div>R$ {{ number_format($last_month_incomes, 2, ',', '.') }}</div>
        </div>
        <div class="d-flex justify-content-between">
          <div>Saídas:</div>
          <div>R$ {{ number_format($last_month_expenses, 2, ',', '.') }}</div>
        </div>
        <div class="d-flex justify-content-between">
          <div>Balanço:</div>
          <div class="@if ($last_month_balance > 0) text-success @else text-danger @endif">R$ {{ number_format($last_month_balance, 2, ',', '.') }}</div>
        </div>
      </div>

      <div class="my-3 me-5">
        <h5 class="mb-0"> {{ __('Current Year') }} ({{ date("Y") }})</h5>
        <div class="mt-1 d-flex justify-content-between">
          <div>Entradas:</div>
          <div>R$ {{ number_format($current_year_incomes, 2, ',', '.') }}</div>
        </div>
        <div class="d-flex justify-content-between">
          <div>Saídas:</div>
          <div>R$ {{ number_format($current_year_expenses, 2, ',', '.') }}</div>
        </div>
        <div class="d-flex justify-content-between">
          <div>Balanço:</div>
          <div class="@if ($current_year_balance > 0) text-success @else text-danger @endif">R$ {{ number_format($current_year_balance, 2, ',', '.') }}</div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-sm-12">
          <div class="d-flex justify-content-end">
            <a href="{{ route('dashboard.finances.accounts.general-resume') }}" class="btn btn-outline-secondary">Exportar em PDF</a>
          </div>
        </div>
      </div>
      <hr>
    </div>
    <div class="col-sm-8">
      <a href="{{ route('dashboard.finances.accounts.create') }}">
        <button type="button" class="btn btn-primary mb-3">
          Adicionar Conta
        </button>
      </a>
      <div class="table-responsive">
        <table class="table   ">
          <thead>
            <tr>
              <th scope="col">Conta</th>
              <th scope="col">Saldo Atual</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach($accounts as $account)
              <tr>
                <td>{{ $account->name }}</td>
                <td> R$ {{ number_format($account->balance/100, 2, ',', '.') }} </td>
                <td class="d-flex">
                  <a href="{{ route('dashboard.finances.accounts.show', $account->id) }}">
                    <button type="button" class="btn btn-outline-primary me-2 py-0">
                      <span>
                        {{ __('Details') }}
                      </span>
                    </button>
                  </a>
                  <a href="{{ route('dashboard.finances.accounts.edit', $account->id) }}">
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
      </div>
      <hr>
      <h3>Relatório Financeiro</h3>
      <p>
        O relatório financeiro consiste em um balanço de todas as receitas e despesas no período selecionado.
      </p>
      <form action="{{ route('dashboard.finances.accounts.custom-report') }}" method="GET">
        <div class="row my-4">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="account_id">Conta</label>
              <select id="account_id" class="form-control" name="account_id">
                <option value="0">Todas as Contas</option>
                @foreach ($accounts as $account)
                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="initial_date">Data Inicial</label>
              <input id="initial_date" type="date" class="form-control" name="initial_date" required>
              <div class="invalid-feedback">
                {{ __('Please enter a valid initial date for the report.') }}
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="final_date">Data Final</label>
              <input id="final_date" type="date" class="form-control" name="final_date" required>
              <div class="invalid-feedback">
                {{ __('Please enter a valid final date for the report.') }}
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary my-1">Gerar PDF</button>
        </div>
      </form>
      <hr>
    </div>
  </div>

</x-app-layout>

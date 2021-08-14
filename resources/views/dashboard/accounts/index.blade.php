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
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        Saldo:
                    </h5>
                    <h5 class="mb-0">
                        R$ {{ number_format($total_balance, 2, ',', '.') }}
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        Entradas:
                    </h5>
                    <h5 class="mb-0">
                        R$ {{ number_format($current_month_incomes, 2, ',', '.') }}
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        Saídas:
                    </h5>
                    <h5 class="mb-0">
                        R$ {{ number_format($current_month_expenses, 2, ',', '.') }}
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        Balanço:
                    </h5>
                    <h5 class="mb-0 @if ($current_month_balance > 0) text-success @else text-danger @endif">
                        R$ {{ number_format($current_month_balance, 2, ',', '.') }}
                    </h5>
                </div>
            </div>
        </div>
    </div>

      {{-- <div class="my-3 me-5">
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
      </div> --}}

      {{-- <div class="row mt-4">
        <div class="col-sm-12">
          <div class="d-flex justify-content-end">
            <a href="{{ route('dashboard.finances.accounts.general-resume') }}" class="btn btn-outline-secondary">Exportar em PDF</a>
          </div>
        </div>
      </div> --}}

    <div class="card mb-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-7 d-flex align-items-center justify-content-start mb-4">
                    <h3 class="card-title pt-2 pe-4">Todas as Contas</h3>
                    <a href="{{ route('dashboard.finances.accounts.create') }}" class="btn btn-primary">{{ __('Add Account') }}</a>
                </div>
                <div class="col-md-5 mb-4">
                    <div class="btn-group float-end">
                        <a href="{{ route('dashboard.finances.accounts.general-resume') }}" class="btn btn-outline-secondary">Exportar em PDF</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
              <table class="table">
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
                          <button type="button" class="btn btn-outline-info me-2 py-0">
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
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3>Relatório Financeiro</h3>
            <p>
              O relatório financeiro consiste em um balanço de todas as receitas e despesas no período selecionado.
            </p>
            <form action="{{ route('dashboard.finances.accounts.custom-report') }}" method="GET">
                <div class="row my-4 align-items-end">
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label for="account_id">Conta</label>
                            <select id="account_id" class="form-control" name="account_id">
                            <option value="0" disabled selected>Todas as Contas</option>
                            @foreach ($accounts as $account)
                                <option value="{{ $account->id }}">{{ $account->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label for="initial_date">Data Inicial</label>
                            <input id="initial_date" type="date" class="form-control" name="initial_date" required>
                            <div class="invalid-feedback">
                            {{ __('Please enter a valid initial date for the report.') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label for="final_date">Data Final</label>
                            <input id="final_date" type="date" class="form-control" name="final_date" required>
                            <div class="invalid-feedback">
                            {{ __('Please enter a valid final date for the report.') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <button type="submit" class="btn btn-primary">Gerar PDF</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>

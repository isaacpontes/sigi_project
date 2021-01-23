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
    <div class="col-md-6">
      <a href="{{ route('dashboard.accounts.create') }}">
        <button type="button" class="btn btn-sm btn-primary mb-3">
          Adicionar Conta
        </button>
      </a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
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
                  <a href="{{ route('dashboard.accounts.show', $account->id) }}">
                    <button type="button" class="btn btn-sm btn-secondary mr-2 py-0">
                      <span>
                        Details
                      </span>
                    </button>
                  </a>
                  <a href="{{ route('dashboard.accounts.edit', $account->id) }}">
                    <button type="button" class="btn btn-sm btn-light mr-2 py-0">
                      <span>
                        Edit
                      </span>
                    </button>
                  </a>
                  <form action="{{ route('dashboard.accounts.destroy', $account->id) }}" method="post">
                    @csrf
                    {{ method_field('delete') }}
                    <button type="submit" class="btn btn-sm btn-danger py-0">
                      <span>
                        Delete
                      </span>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <hr>
    </div>
    <div class="col-md-6">
      <h3 class="my-1">Resumo Financeiro</h3>
      <div class="row mt-3">
        <div class="col-sm-8">
          <h5>
            Saldo Atual:
            R$ {{ number_format($total_balance, 2, ',', '.') }}
          </h5>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-sm-5">
          <h5 class="mb-0"> {{ __('Current Month') }}: </h5>
          <span>({{ date("m/Y") }})</span>
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
        <div class="col-sm-5">
          <h5 class="mb-0"> {{ __('Current Year') }}: </h5>
          <span>({{ date("Y") }})</span>
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
      </div>
      <div class="row mt-3">
        <div class="col-sm-5">
          <h5 class="mb-0"> {{ __('Last Month') }}: </h5>
          <span>({{ date("m/Y", strtotime("-1 month")) }})</span>
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
        <div class="col-sm-5">
          <h5 class="mb-0"> {{ __('Last Year') }}: </h5>
          <span>({{ date("Y", strtotime("-1 year")) }})</span>
          <div class="mt-1 d-flex justify-content-between">
            <div>Entradas:</div>
            <div>R$ {{ number_format($last_year_incomes, 2, ',', '.') }}</div>
          </div>
          <div class="d-flex justify-content-between">
            <div>Saídas:</div>
            <div>R$ {{ number_format($last_year_expenses, 2, ',', '.') }}</div>
          </div>
          <div class="d-flex justify-content-between">
            <div>Balanço:</div>
            <div class="@if ($last_year_balance > 0) text-success @else text-danger @endif">R$ {{ number_format($last_year_balance, 2, ',', '.') }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>

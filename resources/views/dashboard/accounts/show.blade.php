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
          <a href="#" class="btn btn-sm btn-outline-secondary">
            Exportar em PDF
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <h3 class="mb-3">Últimos Lancamentos</h3>
      <div class="row">
        <div class="col-sm-6">
          <h5>Entradas</h5>
          @foreach ($incomes as $income)
            <li>{{ $income->name }}</li>
          @endforeach
        </div>
        <div class="col-sm-6">
          <h5>Saídas</h5>
          @foreach ($expenses as $expense)
            <li>{{ $expense->name }}</li>
          @endforeach
        </div>
      </div>
    </div>
  </div>

</x-app-layout>


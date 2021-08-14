<x-app-layout>
    <x-slot name="header">
        {{ __('Expense') . " - " . $expense->name }}
    </x-slot>

    <div class="card mb-4">
        <div class="card-body">
            <div class="row mb-3">
              <div class="col-md-6">
                <h5> {{ __('Name') }}: </h5>
                <label>{{ $expense->name }}</label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <h5> {{ __('Value') }}: </h5>
                <label>R$ {{ number_format($expense->value/100, '2', ',', '.') }}</label>
              </div>
              <div class="col-md-6">
                <h5> {{ __('Date') }}: </h5>
                <label>{{ date("d/m/Y", strtotime($expense->ref_date)) }}</label>
              </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                  <h5> {{ __('Category') }}: </h5>
                  <label>{{ $expense->expenseCategory->name }}</label>
                </div>
                <div class="col-md-6">
                  <h5> {{ __('Account') }}: </h5>
                  <label>{{ $expense->account->name }}</label>
                </div>
            </div>
            @isset($expense->add_info)
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h5> {{ __('Additional Information') }}: </h5>
                        <label>{{ $expense->add_info }}</label>
                    </div>
                </div>
            @endisset
            <hr>
            <div class="mb-3 d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="{{ url()->previous() }}">
                  <button type="button" class="btn btn-primary">Voltar</button>
                </a>
                <a href="{{ route('dashboard.finances.expenses.edit', $expense->id) }}">
                  <button type="button" class="btn btn-outline-secondary ms-1">Editar</button>
                </a>
              </div>

              <div class="btn-group me-3">
              </div>
            </div>
        </div>
    </div>

</x-app-layout>

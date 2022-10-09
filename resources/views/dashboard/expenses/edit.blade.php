<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Expense') . ' - ' . $expense->name }}
    </x-slot>

    <div class="row">
        <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    {{ __('Editar Informações da Despesa') }}
                </div>
                <div class="card-body">
                    <x-error-alert />
                    <form action="{{ route('dashboard.finances.expenses.update', $expense) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nome</label>

                            <div class="col-md-8">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $expense->name }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="value" class="col-md-4 col-form-label text-md-end">Valor</label>

                            <div class="col-md-6">
                                <input id="value" type="number" step="0.01"
                                    class="form-control @error('value') is-invalid @enderror" name="value"
                                    value="{{ $expense->value / 100 }}" required>

                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="ref_date" class="col-md-4 col-form-label text-md-end">Data</label>

                            <div class="col-md-6">
                                <input id="ref_date" type="date"
                                    class="form-control @error('ref_date') is-invalid @enderror" name="ref_date"
                                    value="{{ $expense->ref_date }}" required>

                                @error('ref_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="expense_category" class="col-md-4 col-form-label text-md-end">Categoria</label>

                            <div class="col-md-6">
                                <select id="expense_category" class="ml-3 form-select" name="expense_category_id"
                                    required>
                                    <option disabled>Selecione uma Categoria</option>
                                    @foreach ($expense_categories as $key => $value)
                                        <option value="{{ $key }}"
                                            @if ($expense->expense_category_id === $key) selected @endif>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="account" class="col-md-4 col-form-label text-md-end">Conta</label>

                            <div class="col-md-6">
                                <select id="account" class="ml-3 form-select" name="account_id" required>
                                    <option disabled>Selecione uma conta</option>
                                    @foreach ($accounts as $key => $value)
                                        <option value="{{ $key }}"
                                            @if ($expense->account_id === $key) selected @endif>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="add_info" class="col-md-4 col-form-label text-md-end">Informações
                                Adicionais</label>

                            <div class="col-md-6">
                                <textarea id="add_info" type="add_info" class="form-control @error('add_info') is-invalid @enderror" name="add_info"
                                    rows="4">{{ $expense->add_info }}</textarea>

                                @error('add_info')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="button-group float-end">
                            <button type="submit" class="btn btn-success">
                                {{ __('Salvar') }}
                            </button>
                            <a href="{{ route('dashboard.finances.expenses.index') }}" class="btn btn-outline-secondary">
                                {{ __('Cancelar') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

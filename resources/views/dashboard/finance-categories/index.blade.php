<x-app-layout>
    <x-slot name="header">
        {{ __('Financial Entries') }}
    </x-slot>

    <x-error-alert />

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <h3>{{ __('Income Categories')}}</h3>
                        </div>
                        <div class="col-md-5">
                            <a href="{{ route('dashboard.finances.incomes.index') }}" class="btn btn-outline-secondary float-end">
                                {{ __('All Incomes') }}
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($income_categories as $income_category)
                                    <tr>
                                        <td>{{ $income_category->name }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('dashboard.finances.categories-incomes.show', $income_category->id) }}">
                                              <button type="button" class="btn btn-outline-info me-2 py-0">
                                                <span>
                                                  {{ __('Details') }}
                                                </span>
                                              </button>
                                            </a>
                                            <a href="{{ route('dashboard.finances.categories-incomes.edit', $income_category->id) }}">
                                              <button type="button" class="btn btn-outline-secondary me-2 py-0">
                                                <span>
                                                  {{ __('Edit') }}
                                                </span>
                                              </button>
                                            </a>
                                            <form
                                                action="{{ route('dashboard.finances.categories-incomes.destroy', $income_category->id) }}"
                                                method="post"
                                                class="delete-confirmation"
                                            >
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-outline-danger me-2 py-0">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                          </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h5>{{ __('Add Income Category')}}</h5>
                    <form action="{{ route('dashboard.finances.categories-incomes.store') }}" method="post">
                        @csrf

                        <div class="mb-3 row">
                            <div class="col-8 col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Ofertas" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-2 col-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <h3>{{ __('Expense Categories')}}</h3>
                        </div>
                        <div class="col-md-5">
                            <a href="{{ route('dashboard.finances.expenses.index') }}" class="btn btn-outline-secondary float-end">
                                {{ __('All Expenses') }}
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expense_categories as $expense_category)
                                    <tr>
                                        <td>{{ $expense_category->name }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('dashboard.finances.categories-expenses.show', $expense_category->id) }}">
                                              <button type="button" class="btn btn-outline-info me-2 py-0">
                                                <span>
                                                  {{ __('Details') }}
                                                </span>
                                              </button>
                                            </a>
                                            <a href="{{ route('dashboard.finances.categories-expenses.edit', $expense_category->id) }}">
                                              <button type="button" class="btn btn-outline-secondary me-2 py-0">
                                                <span>
                                                  {{ __('Edit') }}
                                                </span>
                                              </button>
                                            </a>
                                            <form
                                                action="{{ route('dashboard.finances.categories-expenses.destroy', $expense_category->id) }}"
                                                method="post"
                                                class="delete-confirmation"
                                            >
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-outline-danger me-2 py-0">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                          </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h5>{{ __('Add Expense Category')}}</h5>
                    <form action="{{ route('dashboard.finances.categories-expenses.store') }}" method="post">
                        @csrf

                        <div class="mb-3 row">
                            <div class="col-8 col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Impostos" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-2 col-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

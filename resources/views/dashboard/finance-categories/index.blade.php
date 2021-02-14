<x-app-layout>
    <x-slot name="header">
        {{ __('Financial Entries') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-3">Receitas</h3>
                    <form action="{{ route('dashboard.finances.categories-incomes.store') }}" method="post">
                        @csrf
            
                        <div class="mb-3 row">            
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Ofertas" required>
            
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
        
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Adicionar Categoria
                                </button>
                            </div>
                        </div>
            
                    </form>
                </div>
            </div>
        
            <div class="table-responsive">
        
                <table class="table   ">
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
                                      <button type="button" class="btn btn-outline-primary me-2 py-0">
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
                                    <form action="{{ route('dashboard.finances.categories-incomes.destroy', $income_category->id) }}" method="post">
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
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-3">Despesas</h3>
                    <form action="{{ route('dashboard.finances.categories-expenses.store') }}" method="post">
                        @csrf
            
                        <div class="mb-3 row">            
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Impostos" required>
            
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
        
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Adicionar Categoria
                                </button>
                            </div>
                        </div>
            
                    </form>
                </div>
            </div>
        
            <div class="table-responsive">
        
                <table class="table   ">
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
                                      <button type="button" class="btn btn-outline-primary me-2 py-0">
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
                                    <form action="{{ route('dashboard.finances.categories-expenses.destroy', $expense_category->id) }}" method="post">
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
        </div>
    </div>

</x-app-layout>

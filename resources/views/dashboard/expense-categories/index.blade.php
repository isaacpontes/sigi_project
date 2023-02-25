<x-app-layout>
    <x-slot name="header">
        {{ __('Expense Categories') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('dashboard.finances.categories-expenses.store') }}" method="post">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name" class="col-md-1 col-form-label text-md-end">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>

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
                                    <a href="{{ route('dashboard.finances.categories-expenses.edit', $expense_category->id) }}">
                                        <button type="button" class="btn btn-outline-secondary me-2 py-0">
                                        <span>
                                            {{ __('Edit') }}
                                        </span>
                                        </button>
                                    </a>
                                    <form
                                        action="{{ route('dashboard.finances.categories-expenses.destroy', $expense_category) }}"
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
        </div>
    </div>

</x-app-layout>

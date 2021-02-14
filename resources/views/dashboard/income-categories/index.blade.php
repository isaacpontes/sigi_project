<x-app-layout>
    <x-slot name="header">
        {{ __('Income Categories') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('dashboard.finances.categories-incomes.store') }}" method="post">
                @csrf
    
                <div class="form-group row">
                    <label for="name" class="col-md-1 col-form-label text-md-right">Nome</label>
    
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

        <table class="table table-striped table-md">
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
                            <a href="{{ route('dashboard.finances.categories-incomes.edit', $income_category->id) }}">
                                <button type="button" class="btn btn-outline-secondary mr-2 py-0">
                                <span>
                                    {{ __('Edit') }}
                                </span>
                                </button>
                            </a>
                            <form action="{{ route('dashboard.finances.categories-incomes.destroy', $income_category) }}" method="post">
                                @csrf
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-outline-danger mr-2 py-0">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>

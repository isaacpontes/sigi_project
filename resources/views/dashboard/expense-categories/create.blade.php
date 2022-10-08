<x-app-layout>
    <x-slot name="header">
        {{ __('New Expense Category') }}
    </x-slot>

    <x-error-alert />

    <form action="{{ route('dashboard.finances.categories-expenses.store') }}" method="post">
        @csrf

        <div class="mb-3 row">
            <label for="name" class="col-md-2 col-form-label text-md-end">Nome</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    required autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-success">
            Cadastrar
        </button>
        <a href="{{ route('dashboard.finances.categories-expenses.index') }}">
            <button type="button" class="btn btn-light">Cancelar</button>
        </a>

    </form>

</x-app-layout>

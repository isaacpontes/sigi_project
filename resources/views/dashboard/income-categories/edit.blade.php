<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Income Category') . " - " . $income_category->name }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.income_categories.update', $income_category) }}" method="post">
        @csrf
        {{ method_field('put') }}

        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label text-md-right">Nome</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $income_category->name }}" required autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Atualizar
        </button>
        <a href="{{ route('dashboard.income_categories.index') }}">
            <button type="button" class="btn btn-light">Cancelar</button>
        </a>

        </form>
    </div>

</x-app-layout>

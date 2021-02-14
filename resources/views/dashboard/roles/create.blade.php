<x-app-layout>
    <x-slot name="header">
        {{ __('New Role') }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.roles.store') }}" method="post">
        @csrf

        <div class="mb-3 row">
            <label for="name" class="col-2 col-form-label text-md-end">Nome</label>

            <div class="col-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Cadastrar
        </button>
        <a href="{{ route('dashboard.roles.index') }}">
            <button type="button" class="btn btn-light">Cancelar</button>
        </a>

        </form>
    </div>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Account') . " - " . $account->name }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.accounts.update', $account) }}" method="post">
        @csrf
        {{ method_field('put') }}

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $account->name }}" required autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="add_info" class="col-md-4 col-form-label text-md-right">Informações Adicionais</label>

            <div class="col-md-6">
                <textarea id="add_info" type="add_info" class="form-control @error('add_info') is-invalid @enderror" name="add_info">{{ $account->add_info }}</textarea>

                @error('add_info')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Atualizar
        </button>
        <a href="{{ route('dashboard.accounts.index') }}">
            <button type="button" class="btn btn-light">Cancelar</button>
        </a>

        </form>
    </div>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        {{ __('New Congregation') }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.congregations.store') }}" method="post">
            @csrf

            <div class="mb-3 row">
                <label for="name" class="col-md-2 col-form-label text-md-end">Nome</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="phone" class="col-md-2 col-form-label text-md-end">Telefone</label>

                <div class="col-md-6">
                    <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required autofocus>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="address" class="col-md-2 col-form-label text-md-end">Endereço</label>

                <div class="col-md-6">
                    <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" required autofocus>

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="add_info" class="col-md-2 col-form-label text-md-end">Informações Adicionais</label>

                <div class="col-md-6">
                    <textarea id="add_info" type="add_info" class="form-control @error('add_info') is-invalid @enderror" name="add_info"></textarea>

                    @error('add_info')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
            <a href="{{ route('dashboard.congregations.index') }}">
                <button type="button" class="btn btn-outline-secondary ms-1">Cancelar</button>
            </a>

        </form>
    </div>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        {{ __('New Church') }}
    </x-slot>

    <div class="card-body">
        <x-error-alert />
        <form action="{{ route('dashboard.churches.store') }}" method="post">
            @csrf

            <div class="mb-3 row">
                <label for="name" class="col-md-2 col-form-label text-md-end">Nome</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" required autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-md-2 col-form-label text-md-end">Email</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="cnpj" class="col-md-2 col-form-label text-md-end">CNPJ</label>

                <div class="col-md-6">
                    <input id="cnpj" type="cnpj" class="form-control @error('cnpj') is-invalid @enderror"
                        name="cnpj" required autofocus>

                    @error('cnpj')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="phone" class="col-md-2 col-form-label text-md-end">Telefone</label>

                <div class="col-md-6">
                    <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror"
                        name="phone" required autofocus>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                Cadastrar
            </button>
            <a href="{{ route('dashboard.churches.index') }}">
                <button type="button" class="btn btn-light">Cancelar</button>
            </a>

        </form>
    </div>

</x-app-layout>

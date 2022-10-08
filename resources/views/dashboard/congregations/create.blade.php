<x-app-layout>
    <x-slot name="header">
        {{ __('New Congregation') }}
    </x-slot>

    <div class="row">
        <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    {{ __('Cadastrar Nova') }}
                    {{ __('Congregação') }}
                </div>
                <div class="card-body">
                    <x-error-alert />
                    <form action="{{ route('dashboard.congregations.store') }}" method="post">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nome</label>

                            <div class="col-md-8">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name" required
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Telefone</label>

                            <div class="col-md-8">
                                <input id="phone" type="phone"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone" required
                                    autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="address" class="col-md-4 col-form-label text-md-end">Endereço</label>

                            <div class="col-md-8">
                                <input id="address" type="address"
                                    class="form-control @error('address') is-invalid @enderror" name="address" required
                                    autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="add_info" class="col-md-4 col-form-label text-md-end">Informações
                                Adicionais</label>

                            <div class="col-md-8">
                                <textarea id="add_info" type="add_info" class="form-control @error('add_info') is-invalid @enderror" name="add_info"
                                    rows="4"></textarea>

                                @error('add_info')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="button-group float-end">
                            <button type="submit" class="btn btn-success">
                                {{ __('Salvar') }}
                            </button>
                            <a href="{{ route('dashboard.congregations.index') }}" class="btn btn-outline-secondary">
                                {{ __('Cancelar') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

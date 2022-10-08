<x-app-layout>
    <x-slot name="header">
        {{ __('New Account') }}
    </x-slot>

    <div class="row">
        <div class="col-md-8 col-lg-6 offset-md-2 offset-lg-3">
            <div class="card mb-4">
                <div class="card-header">
                    Cadastrar Nova Conta
                </div>
                <div class="card-body">
                    <x-error-alert />
                    <form action="{{ route('dashboard.finances.accounts.store') }}" method="post">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-sm-4 col-form-label text-sm-end">Nome</label>

                            <div class="col-sm-8">
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


                        <div class="row mb-3">
                            <label for="balance" class="col-sm-4 col-form-label text-sm-end">Inicializar com
                                Saldo</label>

                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">R$</span>
                                    </div>
                                    <input id="balance" type="number" step="0.01"
                                        class="form-control @error('balance') is-invalid @enderror" name="balance"
                                        required autofocus>
                                </div>
                                @error('balance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="add_info" class="col-sm-4 col-form-label text-sm-end">Informações
                                Adicionais</label>

                            <div class="col-sm-8">
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
                                {{ __('Save') }}
                            </button>
                            <a href="{{ route('dashboard.finances.accounts.index') }}"
                                class="btn btn-outline-secondary ms-1">
                                Cancelar
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

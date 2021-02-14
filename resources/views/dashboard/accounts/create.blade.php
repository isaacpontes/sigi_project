<x-app-layout>
    <x-slot name="header">
        {{ __('New Account') }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.finances.accounts.store') }}" method="post">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label text-md-right">Nome</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label for="balance" class="col-md-2 col-form-label text-md-right">Inicializar com Saldo</label>

            <div class="col-md-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">R$</span>
                </div>
                <input id="balance" type="number" step="0.01" class="form-control @error('balance') is-invalid @enderror" name="balance" required autofocus>
              </div>
              @error('balance')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="add_info" class="col-md-2 col-form-label text-md-right">Informações Adicionais</label>

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
        <a href="{{ route('dashboard.finances.accounts.index') }}">
            <button type="button" class="btn btn-outline-secondary ml-1">Cancelar</button>
        </a>

        </form>
    </div>

</x-app-layout>

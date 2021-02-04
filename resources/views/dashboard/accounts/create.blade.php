<x-app-layout>
    <x-slot name="header">
        {{ __('New Account') }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.accounts.store') }}" method="post">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label-sm text-md-right">Nome</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" required autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label for="balance" class="col-md-2 col-form-label-sm text-md-right">Inicializar com Saldo</label>

            <div class="col-md-6">
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <span class="input-group-text">R$</span>
                </div>
                <input id="balance" type="number" step="0.01" class="form-control form-control-sm @error('balance') is-invalid @enderror" name="balance" required autofocus>
              </div>
              @error('balance')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="add_info" class="col-md-2 col-form-label-sm text-md-right">Informações Adicionais</label>

            <div class="col-md-6">
                <textarea id="add_info" type="add_info" class="form-control form-control-sm @error('add_info') is-invalid @enderror" name="add_info"></textarea>

                @error('add_info')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <hr>
        <button type="submit" class="btn btn-sm btn-primary">
            Adicionar
        </button>
        <a href="{{ route('dashboard.accounts.index') }}">
            <button type="button" class="btn btn-sm btn-secondary">Cancelar</button>
        </a>

        </form>
    </div>

</x-app-layout>

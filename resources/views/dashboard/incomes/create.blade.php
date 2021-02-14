<x-app-layout>
    <x-slot name="header">
        {{ __('New Income') }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.finances.incomes.store') }}" method="post">
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

            <div class="mb-3 row">
                <label for="value" class="col-2 col-form-label text-md-end">Valor</label>

                <div class="col-3">
                    <input id="value" type="number" step="0.01" class="form-control @error('value') is-invalid @enderror" name="value" required>

                    @error('value')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="ref_date" class="col-2 col-form-label text-md-end">Data</label>

                <div class="col-3">
                    <input id="ref_date" type="date" class="form-control @error('ref_date') is-invalid @enderror" name="ref_date" required>

                    @error('ref_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="income_category" class="col-2 col-form-label text-md-end">Categoria</label>

                <div class="col-4">
                    <select id="income_category" class="ml-3 form-select" name="income_category_id" required>
                        <option>Selecione uma Categoria</option>
                        @foreach ($income_categories as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="account" class="col-2 col-form-label text-md-end">Conta</label>

                <div class="col-4">
                    <select id="account" class="ml-3 col-sm-4 form-select" name="account_id" required>
                        <option>Selecione uma conta</option>
                        @foreach ($accounts as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="member" class="col-2 col-form-label text-md-end">Membro</label>

                <div class="col-4">
                    <select id="member" class="ml-3 form-select" name="member_id" required>
                        <option>Selecione um membro (Opcional)</option>
                        @foreach ($members as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="add_info" class="col-2 col-form-label text-md-end">Informações Adicionais</label>

                <div class="col-6">
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
                Cadastrar
            </button>
            <a href="{{ url()->previous() }}">
                <button type="button" class="btn btn-outline-secondary">Cancelar</button>
            </a>
        </form>
    </div>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        {{ __('New Member') }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.members.store') }}" method="post">
            @csrf

            <div class="mb-3 row">
                <label for="name" class="col-md-2 col-form-label text-md-end">Nome</label>

                <div class="col-sm-6">
                    <input id="name" type="text" class="form-control" name="name" required autofocus>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="gender" class="col-md-2 col-form-label text-md-end">Gênero</label>
                <div class="col-md-4 mt-2 ms-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderMale" value="0">
                        <label class="form-check-label" for="genderMale">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="1">
                        <label class="form-check-label" for="genderFemale">Feminino</label>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="birth" class="col-md-2 col-form-label text-md-end">Data de Nascimento</label>

                <div class="col-md-3">
                    <input id="birth" type="date" class="form-control" name="birth" required autofocus>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-md-2 col-form-label text-md-end">Email</label>

                <div class="col-sm-3">
                    <input id="email" type="email" class="form-control" name="email" required autofocus>
                </div>
                <label for="phone" class="col-md-1 col-form-label text-md-end">Telefone</label>

                <div class="col-sm-2">
                    <input id="phone" type="text" class="form-control" name="phone" required autofocus>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="address" class="col-md-2 col-form-label text-md-end">Endereço</label>

                <div class="col-sm-6">
                    <input id="address" type="text" class="form-control" name="address" required autofocus>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="admission" class="col-md-2 col-form-label text-md-end">Data de Admissão</label>

                <div class="col-md-3">
                    <input id="admission" type="date" class="form-control" name="admission" required autofocus>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="congregation" class="col-md-2 col-form-label text-md-end">Congregação</label>

                <div class="col-md-4">
                    <select id="congregation" class="ml-3 form-select" name="congregation_id" required autofocus>
                        <option>Selecione uma Congregação</option>
                        @foreach ($congregations as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="classroom" class="col-md-2 col-form-label text-md-end">Classe</label>

                <div class="col-md-4">
                    <select id="classroom" class="ml-3 form-select" name="classroom_id" autofocus>
                        <option>Selecione uma Classe</option>
                        @foreach ($classrooms as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
            <a href="{{ route('dashboard.members.index') }}">
                <button type="button" class="btn btn-outline-secondary ms-1">Cancelar</button>
            </a>

        </form>
    </div>

</x-app-layout>

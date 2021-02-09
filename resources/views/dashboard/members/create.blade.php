<x-app-layout>
    <x-slot name="header">
        {{ __('New Member') }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.members.store') }}" method="post">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">Nome</label>

                <div class="col-sm-6">
                    <input id="name" type="text" class="form-control" name="name" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="gender" class="col-md-2 col-form-label text-md-right">Gênero</label>
                <div class="ml-4 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="genderMale" value="0">
                    <label class="form-check-label mt-1" for="genderMale">Masculino</label>
                </div>
                <div class="ml-4 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="1">
                    <label class="form-check-label mt-1" for="genderFemale">Feminino</label>
                </div>
            </div>

            <div class="form-group row">
                <label for="birth" class="col-md-2 col-form-label text-md-right">Data de Nascimento</label>

                <div class="col-md-3">
                    <input id="birth" type="date" class="form-control" name="birth" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                <div class="col-sm-3">
                    <input id="email" type="email" class="form-control" name="email" required autofocus>
                </div>
                <label for="phone" class="col-md-1 col-form-label text-md-right">Telefone</label>

                <div class="col-sm-2">
                    <input id="phone" type="text" class="form-control" name="phone" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-2 col-form-label text-md-right">Endereço</label>

                <div class="col-sm-6">
                    <input id="address" type="text" class="form-control" name="address" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="admission" class="col-md-2 col-form-label text-md-right">Data de Admissão</label>

                <div class="col-md-3">
                    <input id="admission" type="date" class="form-control" name="admission" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="congregation" class="col-md-2 col-form-label text-md-right">Congregação</label>

                <select id="congregation" class="ml-3 col-sm-4 form-control" name="congregation_id" required autofocus>
                    <option>Selecione uma Congregação</option>
                    @foreach ($congregations as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group row">
                <label for="classroom" class="col-md-2 col-form-label text-md-right">Classe</label>

                <select id="classroom" class="ml-3 col-sm-4 form-control" name="classroom_id" autofocus>
                    <option>Selecione uma Classe</option>
                    @foreach ($classrooms as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
            <a href="{{ route('dashboard.members.index') }}">
                <button type="button" class="btn btn-outline-secondary ml-1">Cancelar</button>
            </a>

        </form>
    </div>

</x-app-layout>

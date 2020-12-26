<x-app-layout>
    <x-slot name="header">
        {{ __('New Member') }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.members.store') }}" method="post">
        @csrf

        <div class="form-group row">
            <label for="congregation" class="col-md-2 col-form-label text-md-right">Congregação</label>

            <select id="congregation" class="col-md-4 offset-md-1 form-control" name="congregation_id" required autofocus>
                @foreach ($congregations as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group row">
            <label for="classroom" class="col-md-2 col-form-label text-md-right">Classe</label>

            <select id="classroom" class="col-md-4 offset-md-1 form-control" name="classroom_id" autofocus>
                <option value="">Selecione uma classe...</option>
                @foreach ($classrooms as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label text-md-right">Nome</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" required autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="gender" class="col-md-2 col-form-label text-md-right">Gênero</label>

            <div class="col-md-2 offset-md-1 form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender0" value="0">
                <label class="form-check-label" for="inlineRadio1">Feminino</label>
            </div>
            <div class="col-md-2 form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender1" value="1">
                <label class="form-check-label" for="inlineRadio2">Masculino</label>
            </div>
        </div>

        <div class="form-group row">
            <label for="birth" class="col-md-2 col-form-label text-md-right">Data de Nascimento</label>

            <div class="col-md-4">
                <input id="birth" type="date" class="form-control" name="birth" required autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" required autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-2 col-form-label text-md-right">Telefone</label>

            <div class="col-md-6">
                <input id="phone" type="text" class="form-control" name="phone" required autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-md-2 col-form-label text-md-right">Endereço</label>

            <div class="col-md-6">
                <input id="address" type="text" class="form-control" name="address" required autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="admission" class="col-md-2 col-form-label text-md-right">Data de Admissão</label>

            <div class="col-md-4">
                <input id="admission" type="date" class="form-control" name="admission" required autofocus>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Cadastrar
        </button>
        <a href="{{ route('dashboard.members.index') }}">
            <button type="button" class="btn btn-light">Cancelar</button>
        </a>

        </form>
    </div>

</x-app-layout>

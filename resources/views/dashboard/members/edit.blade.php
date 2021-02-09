<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Member') . " - " . $member->name }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.members.update', $member) }}" method="post">
            @csrf
            {{ method_field('put') }}
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">Nome</label>

                <div class="col-sm-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $member->name }}" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="gender" class="col-md-2 col-form-label text-md-right">Gênero</label>
                <div class="ml-4 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="genderMale" value="0" @if ($member->gender === 0) checked @endif>
                    <label class="form-check-label mt-1" for="genderMale">Masculino</label>
                </div>
                <div class="ml-4 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="1" @if ($member->gender === 1) checked @endif>
                    <label class="form-check-label mt-1" for="genderFemale">Feminino</label>
                </div>
            </div>

            <div class="form-group row">
                <label for="birth" class="col-md-2 col-form-label text-md-right">Data de Nascimento</label>

                <div class="col-md-3">
                    <input id="birth" type="date" class="form-control" name="birth" value="{{ $member->birth }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                <div class="col-sm-3">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $member->email }}" required>
                </div>
                <label for="phone" class="col-md-1 col-form-label text-md-right">Telefone</label>

                <div class="col-sm-2">
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $member->phone }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-2 col-form-label text-md-right">Endereço</label>

                <div class="col-sm-6">
                    <input id="address" type="text" class="form-control" name="address" value="{{ $member->address }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="admission" class="col-md-2 col-form-label text-md-right">Data de Admissão</label>

                <div class="col-md-3">
                    <input id="admission" type="date" class="form-control" name="admission" value="{{ $member->admission }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="demission" class="col-md-2 col-form-label text-md-right">Data de Saída</label>

                <div class="col-md-3">
                    <input id="demission" type="date" class="form-control" name="demission" value="{{ $member->demission }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="congregation" class="col-md-2 col-form-label text-md-right">Congregação</label>

                <select id="congregation" class="ml-3 col-sm-4 form-control" name="congregation_id" required>
                    <option>Selecione uma Congregação</option>
                    @foreach ($congregations as $key => $value)
                        <option value="{{ $key }}" @if ($member->congregation_id === $key) selected @endif>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group row">
                <label for="classroom" class="col-md-2 col-form-label text-md-right">Classe</label>

                <select id="classroom" class="ml-3 col-sm-4 form-control" name="classroom_id">
                    <option>Selecione uma Classe</option>
                    @foreach ($classrooms as $key => $value)
                        <option value="{{ $key }}" @if ($member->classroom_id === $key) selected @endif>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">
                Cadastrar
            </button>
            <a href="{{ route('dashboard.members.index') }}">
                <button type="button" class="btn btn-secondary ml-1">Cancelar</button>
            </a>

        </form>
    </div>

</x-app-layout>

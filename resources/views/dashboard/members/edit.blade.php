<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Member') . " - " . $member->name }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.members.update', $member) }}" method="post">
            @csrf
            {{ method_field('put') }}
            <div class="mb-3 row">
                <label for="name" class="col-2 col-form-label text-md-end">Nome</label>

                <div class="col-sm-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $member->name }}" required autofocus>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="gender" class="col-2 col-form-label text-md-end">Gênero</label>
                <div class="col-4 mt-2 ms-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderMale" value="0" @if ($member->gender === 0) checked @endif>
                        <label class="form-check-label" for="genderMale">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="1" @if ($member->gender === 1) checked @endif>
                        <label class="form-check-label" for="genderFemale">Feminino</label>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="birth" class="col-2 col-form-label text-md-end">Data de Nascimento</label>

                <div class="col-3">
                    <input id="birth" type="date" class="form-control" name="birth" value="{{ $member->birth }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-2 col-form-label text-md-end">Email</label>

                <div class="col-sm-3">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $member->email }}" required>
                </div>
                <label for="phone" class="col-1 col-form-label text-md-end">Telefone</label>

                <div class="col-sm-2">
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $member->phone }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="address" class="col-2 col-form-label text-md-end">Endereço</label>

                <div class="col-sm-6">
                    <input id="address" type="text" class="form-control" name="address" value="{{ $member->address }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="admission" class="col-2 col-form-label text-md-end">Data de Admissão</label>

                <div class="col-3">
                    <input id="admission" type="date" class="form-control" name="admission" value="{{ $member->admission }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="demission" class="col-2 col-form-label text-md-end">Data de Saída</label>

                <div class="col-3">
                    <input id="demission" type="date" class="form-control" name="demission" value="{{ $member->demission }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="congregation" class="col-2 col-form-label text-md-end">Congregação</label>

                <div class="col-4">
                    <select id="congregation" class="form-select" name="congregation_id" required>
                        <option>Selecione uma Congregação</option>
                        @foreach ($congregations as $key => $value)
                            <option value="{{ $key }}" @if ($member->congregation_id === $key) selected @endif>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="classroom" class="col-2 col-form-label text-md-end">Classe</label>

                <div class="col-4">
                    <select id="classroom" class="form-select" name="classroom_id">
                        <option>Selecione uma Classe</option>
                        @foreach ($classrooms as $key => $value)
                            <option value="{{ $key }}" @if ($member->classroom_id === $key) selected @endif>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">
                Cadastrar
            </button>
            <a href="{{ route('dashboard.members.index') }}">
                <button type="button" class="btn btn-outline-secondary ms-1">Cancelar</button>
            </a>

        </form>
    </div>

</x-app-layout>

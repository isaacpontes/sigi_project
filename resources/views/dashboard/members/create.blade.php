<x-app-layout>
    <x-slot name="header">
        {{ __('New Member') }}
    </x-slot>

    <div class="row">
        <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    {{ __('Cadastrar Novo') }}
                    {{ __('Membro') }}
                </div>
                <div class="card-body">
                    <x-error-alert />
                    <form action="{{ route('dashboard.membership.members.store') }}" method="post">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end">
                                {{ __('Nome') }}
                            </label>

                            <div class="col-sm-8">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">
                                {{ __('Gênero') }}
                            </label>
                            <div class="col-md-6 mt-2 ms-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderMale" value="0">
                                    <label class="form-check-label" for="genderMale">
                                        {{ __('Masculino') }}
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="1">
                                    <label class="form-check-label" for="genderFemale">
                                        {{ __('Feminino') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="birth" class="col-md-4 col-form-label text-md-end">
                                {{ __('Data de Nascimento') }}
                            </label>

                            <div class="col-md-6">
                                <input id="birth" type="date" class="form-control" name="birth" required autofocus>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                {{ __('Email') }}
                            </label>

                            <div class="col-sm-6">
                                <input id="email" type="email" class="form-control" name="email" required autofocus>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">
                                {{ __('Telefone') }}
                            </label>

                            <div class="col-sm-6">
                                <input id="phone" type="text" class="form-control" name="phone" required autofocus>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="address" class="col-md-4 col-form-label text-md-end">
                                {{ __('Endereço') }}
                            </label>

                            <div class="col-sm-8">
                                <input id="address" type="text" class="form-control" name="address" required autofocus>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="admission" class="col-md-4 col-form-label text-md-end">
                                {{ __('Data de Admissão') }}
                            </label>

                            <div class="col-md-6">
                                <input id="admission" type="date" class="form-control" name="admission" required autofocus>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="congregation" class="col-md-4 col-form-label text-md-end">
                                {{ __('Congregação') }}
                            </label>

                            <div class="col-md-6">
                                <select id="congregation" class="ml-3 form-select" name="congregation_id" required autofocus>
                                    <option value="" disabled selected>
                                        {{ __('Selecione uma congregação') }}
                                    </option>
                                    @foreach ($congregations as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="classroom" class="col-md-4 col-form-label text-md-end">
                                {{ __('Classe') }}
                            </label>

                            <div class="col-md-6">
                                <select id="classroom" class="ml-3 form-select" name="classroom_id" autofocus>
                                    <option value="" disabled selected>
                                        {{ __('Selecione uma classe') }}
                                    </option>
                                    @foreach ($classrooms as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <hr>

                        <div class="button-group float-end">
                            <button type="submit" class="btn btn-success">
                                {{ __('Salvar') }}
                            </button>
                            <a href="{{ route('dashboard.membership.members.index') }}" class="btn btn-outline-secondary">
                                {{ __('Cancelar') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

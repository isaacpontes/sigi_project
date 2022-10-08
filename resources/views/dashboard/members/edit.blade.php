<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Member') . ' - ' . $member->name }}
    </x-slot>

    <div class="row">
        <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    {{ __('Editar Informações do Membro') }} - {{ $member->name }}
                </div>
                <div class="card-body">
                    <x-error-alert />
                    <form action="{{ route('dashboard.membership.members.update', $member) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end">
                                {{ __('Nome') }}
                            </label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ $member->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">
                                {{ __('Gênero') }}
                            </label>
                            <div class="col-md-6 mt-2 ms-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderMale"
                                        value="0" @if ($member->gender === 0) checked @endif>
                                    <label class="form-check-label" for="genderMale">
                                        {{ __('Masculino') }}
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderFemale"
                                        value="1" @if ($member->gender === 1) checked @endif>
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
                                <input id="birth" type="date" class="form-control" name="birth"
                                    value="{{ $member->birth }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                {{ __('Email') }}
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ $member->email }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">
                                {{ __('Telefone') }}
                            </label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone"
                                    value="{{ $member->phone }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="address" class="col-md-4 col-form-label text-md-end">
                                {{ __('Endereço') }}
                            </label>

                            <div class="col-md-8">
                                <input id="address" type="text" class="form-control" name="address"
                                    value="{{ $member->address }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="admission" class="col-md-4 col-form-label text-md-end">
                                {{ __('Data de Admissão') }}
                            </label>

                            <div class="col-md-6">
                                <input id="admission" type="date" class="form-control" name="admission"
                                    value="{{ $member->admission }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="demission" class="col-md-4 col-form-label text-md-end">
                                {{ __('Data de Desligamento') }}
                            </label>

                            <div class="col-md-6">
                                <input id="demission" type="date" class="form-control" name="demission"
                                    value="{{ $member->demission }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="congregation" class="col-md-4 col-form-label text-md-end">
                                {{ __('Congregação') }}
                            </label>

                            <div class="col-md-8">
                                <select id="congregation" class="form-select" name="congregation_id" required>
                                    <option>
                                        {{ __('Selecione uma congregação') }}
                                    </option>
                                    @foreach ($congregations as $key => $value)
                                        <option value="{{ $key }}"
                                            @if ($member->congregation_id === $key) selected @endif>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="classroom" class="col-md-4 col-form-label text-md-end">
                                {{ __('Classe') }}
                            </label>

                            <div class="col-md-8">
                                <select id="classroom" class="form-select" name="classroom_id">
                                    <option value="null">
                                        {{ __('Selecione uma classe') }}
                                    </option>
                                    @foreach ($classrooms as $key => $value)
                                        <option value="{{ $key }}"
                                            @if ($member->classroom_id === $key) selected @endif>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <hr>

                        <div class="button-group float-end">
                            <button type="submit" class="btn btn-success">
                                {{ __('Save') }}
                            </button>
                            <a href="{{ route('dashboard.membership.members.index') }}"
                                class="btn btn-outline-secondary">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

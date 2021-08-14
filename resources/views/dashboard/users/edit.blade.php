<x-app-layout>
    <x-slot name="header">
        {{ __('Edit User') . " - " . $user->name }}
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-3" :errors="$errors" />

    <!-- Server Errors -->
    @if (session('status'))
        <div class="alert alert-danger" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <div class="card mb-4">
                <div class="card-header">
                    {{ __('Cadastrar Novo') }}
                    {{ __('Usuário') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.users.update', $user) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 row">
                            <label for="name" class="col-md-3 col-form-label text-md-end">
                                {{ __('Nome') }}
                            </label>

                            <div class="col-md-9">
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    required
                                    autofocus
                                    value="{{ $user->name }}"
                                >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-3 col-form-label text-md-end">
                                {{ __('Email') }}
                            </label>

                            <div class="col-md-9">
                                <input
                                    id="email"
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    required
                                    autocomplete="email"
                                    value="{{ $user->email }}"
                                >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label text-md-end">
                                {{ __('Permissões') }}
                            </label>

                            <div class="col-md-9 mt-2">
                                <div class="form-check form-switch">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="church_admin"
                                        name="church_admin"
                                        @if ($user->church_admin) checked @endif
                                    >
                                    <label class="form-check-label" for="church_admin">
                                        {{ __('Administrador(a)') }}
                                    </label>
                                    <p class="text-secondary">
                                        Inclui permissão para gerenciar todos os usuários da igreja, além de gerenciar a própria igreja e suas congregações.
                                    </p>
                                </div>
                                <div class="form-check form-switch">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="members_admin"
                                        name="members_admin"
                                        @if ($user->members_admin) checked @endif
                                    >
                                    <label class="form-check-label" for="members_admin">
                                        {{ __('Secretário(a)') }}
                                    </label>
                                    <p class="text-secondary">
                                        Inclui permissão para gerenciar as classes de estudo bíblico, a membresia da igreja de forma geral e a impressão de seus respectivos relatórios.
                                    </p>
                                </div>
                                <div class="form-check form-switch">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="finances_admin"
                                        name="finances_admin"
                                        @if ($user->finances_admin) checked @endif
                                    >
                                    <label class="form-check-label" for="finances_admin">
                                        {{ __('Tesoureiro(a)') }}
                                    </label>
                                    <p class="text-secondary">
                                        Inclui permissão para gerenciar as finanças da igreja, englobando as contas, os lançamentos, categorias e a impressão de relatórios.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="button-group float-end">
                            <button type="submit" class="btn btn-success">
                                {{ __('Salvar')}}
                            </button>
                            <a href="{{ route('dashboard.users.index') }}" class="btn btn-outline-secondary">
                                {{ __('Cancelar')}}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

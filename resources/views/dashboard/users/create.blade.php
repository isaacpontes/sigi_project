<x-app-layout>
    <x-slot name="header">
        {{ __('Add New User') }}
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-3" :errors="$errors" />

    <!-- Server Errors -->
    @if (session('status'))
        <div class="alert alert-danger" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card-body">
        <form action="{{ route('dashboard.users.store') }}" method="post">
            @csrf

            <div class="mb-3 row">
                <label for="name" class="col-md-2 col-form-label text-md-end">Nome</label>

                <div class="col-md-4">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-md-2 col-form-label text-md-end">Email</label>

                <div class="col-md-4">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="password" class="col-md-2 col-form-label text-md-end">Senha</label>

                <div class="col-md-4">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="password_confirmation" class="col-md-2 col-form-label text-md-end">Confirmar Senha</label>

                <div class="col-md-4">
                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>

                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-md-2 col-form-label text-md-end">Permissões</label>

                <div class="col-md-6 mt-2 ms-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="church_admin" name="church_admin">
                        <label class="form-check-label" for="church_admin">Administrador(a)</label>
                        <p class="text-secondary">Inclui permissão para gerenciar todos os usuários da igreja, além de gerenciar a própria igreja e suas congregações.</p>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="members_admin" name="members_admin">
                        <label class="form-check-label" for="members_admin">Secretario(a)</label>
                        <p class="text-secondary">Inclui permissão para gerenciar as classes de estudo bíblico, a membresia da igreja de forma geral e a impressão de seus respectivos relatórios.</p>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="finances_admin" name="finances_admin">
                        <label class="form-check-label" for="finances_admin">Tesoureiro(a)</label>
                        <p class="text-secondary">Inclui permissão para gerenciar as finanças da igreja, englobando as contas, os lançamentos, categorias e a impressão de relatórios.</p>
                    </div>
                </div>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">
                Salvar
            </button>
            <a href="{{ route('dashboard.users.index') }}">
                <button type="button" class="btn btn-outline-secondary">Cancelar</button>
            </a>
        </form>
    </div>

</x-app-layout>

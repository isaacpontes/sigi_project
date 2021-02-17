<x-app-layout>
    <x-slot name="header">
        {{ __('Edit User') . " - " . $user->name }}
    </x-slot>

    <!-- Server Errors -->
    @if (session('status'))
        <div class="alert alert-danger" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card-body">
        <form action="{{ route('dashboard.users.update', $user) }}" method="post">
        @csrf
        {{ method_field('put') }}

        <div class="mb-3 row">
            <label for="name" class="col-md-2 col-form-label text-md-end">Nome</label>

            <div class="col-md-4">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autofocus>

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
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">

                @error('email')
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
                    <input class="form-check-input" type="checkbox" id="church_admin" name="church_admin" @if ($user->church_admin) checked @endif>
                    <label class="form-check-label" for="church_admin">Administrador(a)</label>
                    <p class="text-secondary">Inclui permissão para gerenciar todos os usuários da igreja, além de gerenciar a própria igreja e suas congregações.</p>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="members_admin" name="members_admin" @if ($user->members_admin) checked @endif>
                    <label class="form-check-label" for="members_admin">Secretario(a)</label>
                    <p class="text-secondary">Inclui permissão para gerenciar as classes de estudo bíblico, a membresia da igreja de forma geral e a impressão de seus respectivos relatórios.</p>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="finances_admin" name="finances_admin" @if ($user->finances_admin) checked @endif>
                    <label class="form-check-label" for="finances_admin">Tesoureiro(a)</label>
                    <p class="text-secondary">Inclui permissão para gerenciar as finanças da igreja, englobando as contas, os lançamentos, categorias e a impressão de relatórios.</p>
                </div>
            </div>
        </div>

        <hr>

        <button type="submit" class="btn btn-primary">
            Atualizar
        </button>
        <a href="{{ route('dashboard.users.show', $user) }}">
            <button type="button" class="btn btn-outline-secondary">Cancelar</button>
        </a>

        </form>
    </div>

</x-app-layout>

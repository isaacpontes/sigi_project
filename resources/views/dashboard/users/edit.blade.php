<x-app-layout>
    <x-slot name="header">
        {{ __('Edit User') . " - " . $user->name }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.users.update', $user) }}" method="post">
        @csrf
        {{ method_field('put') }}

        <div class="mb-3 row">
            <label for="email" class="col-2 col-form-label text-md-end">Email</label>

            <div class="col-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-2 col-form-label text-md-end">Nome</label>

            <div class="col-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- <div class="mb-3 row">
            <label for="roles" class="col-2 col-form-label text-md-end">Permissões</label>

            <div class="col-6">
                @foreach($roles as $role)
                    <div class="form-check">
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                        @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                        <label>{{ $role->name }}</label>
                    </div>
                @endforeach
            </div>
        </div> --}}

        <button type="submit" class="btn btn-primary">
            Atualizar
        </button>
        <a href="{{ route('home') }}">
            <button type="button" class="btn btn-light">Cancelar</button>
        </a>

        </form>
    </div>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        {{ __('New Classroom') }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.classrooms.store') }}" method="post">
            @csrf

            <div class="mb-3 row">
                <label for="name" class="col-md-2 col-form-label text-md-end">Nome</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="add_info" class="col-md-2 col-form-label text-md-end">Informações Adicionais</label>

                <div class="col-md-6">
                    <textarea id="add_info" type="add_info" class="form-control @error('add_info') is-invalid @enderror" name="add_info"></textarea>

                    @error('add_info')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">
                {{ __('Save')}}
            </button>
            <a href="{{ route('dashboard.classrooms.index') }}">
                <button type="button" class="btn btn-outline-secondary">Cancelar</button>
            </a>

        </form>
    </div>

</x-app-layout>

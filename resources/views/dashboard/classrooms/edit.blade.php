<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Classroom') . " - " . $classroom->name }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.classrooms.update', $classroom) }}" method="post">
            @csrf
            {{ method_field('put') }}

            <div class="mb-3 row">
                <label for="name" class="col-2 col-form-label text-md-end">Nome</label>

                <div class="col-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $classroom->name }}" required autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="add_info" class="col-2 col-form-label text-md-end">Informações Adicionais</label>

                <div class="col-6">
                    <textarea id="add_info" type="add_info" class="form-control @error('add_info') is-invalid @enderror" name="add_info">{{ $classroom->add_info }}</textarea>

                    @error('add_info')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">
                Atualizar
            </button>
            <a href="{{ route('dashboard.classrooms.index') }}">
                <button type="button" class="btn btn-outline-secondary">Cancelar</button>
            </a>

        </form>
    </div>

</x-app-layout>

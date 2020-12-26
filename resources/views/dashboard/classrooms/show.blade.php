<x-app-layout>
    <x-slot name="header">
        {{ __('Classroom') . " - " . $classroom->name }}
    </x-slot>

    <div class="col-md-6">
        <label>
            <strong>Nome: </strong>
            {{ $classroom->name }}
        </label>
        <br>
        <label>
            <strong>Informações Adicionais: </strong>
            {{ $classroom->add_info }}
        </label>
        <hr>
        <a href="{{ route('dashboard.classrooms.index') }}">
            <button type="button" class="btn btn-light float-right">Voltar</button>
        </a>
    </div>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        {{ __('Congregation') . " - " . $congregation->name }}
    </x-slot>

    <div class="col-md-6">
        <label>
            <strong>Nome: </strong>
            {{ $congregation->name }}
        </label>
        <br>
        <label>
            <strong>Telefone: </strong>
            {{ $congregation->phone }}
        </label>
        <br>
        <label>
            <strong>Endereço: </strong>
            {{ $congregation->address }}
        </label>
        <br>
        <label>
            <strong>Informações Adicionais: </strong>
            {{ $congregation->add_info }}
        </label>
        <hr>
        <a href="{{ route('dashboard.congregations.index') }}">
            <button type="button" class="btn btn-light float-right">Voltar</button>
        </a>
    </div>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        {{ __('Event') . " - " . $event->name }}
    </x-slot>

    <div class="col-md-6">
        <label>
            <strong>Nome: </strong>
            {{ $event->name }}
        </label>
        <br>
        <label>
            <strong>Descrição: </strong>
            {{ $event->description }}
        </label>
        <br>
        <label>
            <strong>Data e Hora: </strong>
            {{ $event->happens_at }}
        </label>
        <br>
        <hr>
        <a href="{{ route('dashboard.events.index') }}">
            <button type="button" class="btn btn-light float-right">Voltar</button>
        </a>
    </div>

</x-app-layout>

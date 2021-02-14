<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Event') . " - " . $event->name }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.events.update', $event) }}" method="post">
        @csrf
        {{ method_field('put') }}

        <div class="mb-3 row">
            <label for="name" class="col-md-2 col-form-label text-md-end">Nome</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ $event->name }}" required autofocus>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="description" class="col-md-2 col-form-label text-md-end">Descrição</label>

            <div class="col-md-6">
                <textarea id="description" type="text" class="form-control" name="description">{{ $event->description }}</textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="happens_at" class="col-md-2 col-form-label text-md-end">Data e Hora</label>

            <div class="col-md-4">
                <input id="happens_at" type="datetime-local" class="form-control" name="happens_at" value="{{ date('Y-m-d\TH:i', strtotime($event->happens_at)) }}" required autofocus>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Cadastrar
        </button>
        <a href="{{ route('dashboard.events.index') }}">
            <button type="button" class="btn btn-light">Cancelar</button>
        </a>

        </form>
    </div>

</x-app-layout>

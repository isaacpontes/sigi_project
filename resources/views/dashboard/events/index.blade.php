<x-app-layout>
    <x-slot name="header">
        {{ __('Events') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('dashboard.events.create') }}"><button type="button" class="btn btn-primary mb-3">Cadastrar Evento</button></a>

    <div class="table-responsive">

        <table class="table   ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Data e Hora</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
            <tr>
                <th scope="row">{{ $event->id }}</th>
                <td>{{ $event->name }}</td>
                <td>{{ $event->happens_at }}</td>
                <td>
                <a href="{{ route('dashboard.events.show', $event->id) }}">
                    <button type="button" class="btn btn-sm btn-secondary me-2 float-left">Detalhes</button>
                </a>
                <a href="{{ route('dashboard.events.edit', $event->id) }}">
                    <button type="button" class="btn btn-sm btn-light me-2 float-left">Editar</button>
                </a>
                <form action="{{ route('dashboard.events.destroy', $event) }}" method="post" class="float-left">
                    @csrf
                    {{ method_field('delete') }}
                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</x-app-layout>

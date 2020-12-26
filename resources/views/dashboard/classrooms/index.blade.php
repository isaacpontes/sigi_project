<x-app-layout>
    <x-slot name="header">
        {{ __('Classrooms') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('dashboard.classrooms.create') }}"><button type="button" class="btn btn-primary mb-3">Cadastrar Classe</button></a>

    <div class="table-responsive">

        <table class="table table-striped table-md">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($classrooms as $classroom)
        <tr>
            <th scope="row">{{ $classroom->id }}</th>
            <td>{{ $classroom->name }}</td>
            <td>
            <a href="{{ route('dashboard.classrooms.show', $classroom->id) }}">
                <button type="button" class="btn btn-sm btn-secondary mr-2 float-left">Detalhes</button>
            </a>
            <a href="{{ route('dashboard.classrooms.edit', $classroom->id) }}">
                <button type="button" class="btn btn-sm btn-light mr-2 float-left">Editar</button>
            </a>
            <form action="{{ route('dashboard.classrooms.destroy', $classroom) }}" method="post" class="float-left">
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

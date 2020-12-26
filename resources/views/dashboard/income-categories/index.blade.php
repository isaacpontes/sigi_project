<x-app-layout>
    <x-slot name="header">
        {{ __('Income Categories') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('dashboard.income_categories.create') }}">
        <button type="button" class="btn btn-primary mb-3">Adicionar Categoria</button>
    </a>

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
                @foreach($income_categories as $income_category)
                    <tr>
                        <th scope="row">{{ $income_category->id }}</th>
                        <td>{{ $income_category->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.income_categories.show', $income_category->id) }}">
                                <button type="button" class="btn btn-sm btn-secondary mr-2 float-left">Detalhes</button>
                            </a>
                            <a href="{{ route('dashboard.income_categories.edit', $income_category->id) }}">
                                <button type="button" class="btn btn-sm btn-light mr-2 float-left">Editar</button>
                            </a>
                            <form action="{{ route('dashboard.income_categories.destroy', $income_category) }}" method="post" class="float-left">
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

<x-app-layout>
    <x-slot name="header">
        {{ __('Congregations') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-7 d-flex align-items-center justify-content-start mb-4">
                    <h3 class="card-title pt-2 pe-4">{{ __('All Congregations') }}</h3>
                    <a href="{{ route('dashboard.congregations.create') }}" class="btn btn-primary">{{ __('Add Congregation') }}</a>
                </div>
                <div class="col-md-5 mb-4">
                    <div class="btn-group float-end">
                        <a href="{{ route('dashboard.pdf-list.congregations') }}" class="btn btn-outline-secondary">Exportar em PDF</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($congregations as $congregation)
                    <tr>
                    <td>{{ $congregation->name }}</td>
                    <td>{{ $congregation->phone }}</td>
                    <td class="d-flex">
                        <a href="{{ route('dashboard.congregations.show', $congregation->id) }}">
                            <button type="button" class="btn btn-outline-info me-2 py-0">
                                <span>
                                {{ __('Details') }}
                                </span>
                            </button>
                        </a>
                        <a href="{{ route('dashboard.congregations.edit', $congregation->id) }}">
                            <button type="button" class="btn btn-outline-secondary me-2 py-0">
                                <span>
                                {{ __('Edit') }}
                                </span>
                            </button>
                        </a>
                            <form
                                action="{{ route('dashboard.congregations.destroy', $congregation->id) }}"
                                method="post"
                                class="delete-confirmation"
                            >
                                @csrf
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-outline-danger me-2 py-0">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $congregations->links() }}
            </div>
        </div>
    </div>

</x-app-layout>

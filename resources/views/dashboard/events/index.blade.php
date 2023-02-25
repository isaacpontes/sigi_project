<x-app-layout>
    <x-slot name="header">
        {{ __('Events') }}
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
                    <h3 class="card-title pt-2 pe-4">{{ __('All Events') }}</h3>
                    <a href="{{ route('dashboard.membership.events.create') }}" class="btn btn-primary">{{ __('Add Event') }}</a>
                </div>
            </div>

            <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Data e Hora</th>
                    <th scope="col">Conluído?</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ date('H:i - d/m/Y', strtotime($event->happens_at)) }}</td>
                    <td>
                        @if ($event->finished())
                            <span class="text-success ms-3">
                                <i class="fas fa-check-circle fa-fw"></i>
                            </span>
                        @else
                            <span class="text-danger ms-3">
                                <i class="fas fa-times-circle fa-fw"></i>
                            </span>
                        @endif
                    </td>
                    <td class="d-flex">
                        <a href="{{ route('dashboard.membership.events.show', $event->id) }}">
                        <button type="button" class="btn btn-outline-info me-2 py-0">
                            <span>
                            {{ __('Details') }}
                            </span>
                        </button>
                        </a>
                        <a href="{{ route('dashboard.membership.events.edit', $event->id) }}">
                        <button type="button" class="btn btn-outline-secondary me-2 py-0">
                            <span>
                            {{ __('Edit') }}
                            </span>
                        </button>
                        </a>
                        <form
                            action="{{ route('dashboard.membership.events.destroy', $event->id) }}"
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
            </div>
        </div>
        </div>
    </div>

</x-app-layout>

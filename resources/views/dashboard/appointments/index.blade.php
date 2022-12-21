<x-app-layout>
    <x-slot name="header">
        {{ __('Appointments') }}
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
                    <h3 class="card-title pt-2 pe-4">{{ __('My Appointments') }}</h3>
                    <a href="{{ route('dashboard.appointments.create') }}" class="btn btn-primary">{{ __('Add Appointment') }}</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Data e Hora</th>
                            <th scope="col">Completado?</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->name }}</td>
                            <td>{{ date('H:i - d/m/Y', strtotime($appointment->happens_at)) }}</td>
                            <td>
                                @if ($appointment->completed)
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
                                <a href="{{ route('dashboard.appointments.show', $appointment->id) }}" class="btn btn-outline-info me-2 py-0">
                                    {{ __('Details') }}
                                </a>
                                <a href="{{ route('dashboard.appointments.edit', $appointment->id) }}" class="btn btn-outline-secondary me-2 py-0">
                                    {{ __('Edit') }}
                                </a>
                                <form
                                    action="{{ route('dashboard.appointments.destroy', $appointment) }}"
                                    method="post"
                                    class="delete-confirmation"
                                >
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-outline-danger py-0">
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

</x-app-layout>


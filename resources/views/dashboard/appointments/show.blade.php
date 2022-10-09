<x-app-layout>
    <x-slot name="header">
        {{ __('Appointment') . ' - ' . $appointment->name }}
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <h6>{{ __('Name') }}:</h6>
                    <h5>{{ $appointment->name }}</h5>
                </div>
                <div class="col-md-4">
                    <h6>{{ __('Date and Time') }}:</h6>
                    <h5>{{ date('H:i - d/m/Y', strtotime($appointment->happens_at)) }}</h5>
                </div>
                <div class="col-md-4">
                    <h6>{{ __('Finished') }}?</h6>
                    @if ($appointment->completed)
                        <span class="text-success">
                            <i class="fas fa-check-circle fa-fw"></i>
                        </span>
                        <span class="fs-5">Sim</span>
                    @else
                        <span class="text-danger">
                            <i class="fas fa-times-circle fa-fw"></i>
                        </span>
                        <span class="fs-5">Não</span>
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <h6>{{ __('Additional Information') }}:</h6>
                    <h5>{{ $appointment->add_info }}</h5>
                </div>
            </div>

            <hr>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ url()->previous() }}">
                        <button type="button" class="btn btn-primary">Voltar</button>
                    </a>
                    <a href="{{ route('dashboard.appointments.edit', $appointment->id) }}">
                        <button type="button" class="btn btn-outline-secondary ms-1">Editar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        {{ __('Event') . ": " . $event->name }}
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
              <div class="col-md-4">
                <h5> {{ __('Name') }}: </h5>
                <label>{{ $event->name }}</label>
              </div>
              <div class="col-md-4">
                <h5> {{ __('Date and Time') }}: </h5>
                <label>{{ date('H:i - d/m/Y', strtotime($event->happens_at)) }}</label>
              </div>
              <div class="col-md-4">
                <h5> {{ __('Finished') }}? </h5>
                @if ($event->finished())
                    <span class="text-success">
                        <i class="fas fa-check-circle fa-fw"></i>
                    </span>
                    Sim
                @else
                    <span class="text-danger">
                        <i class="fas fa-times-circle fa-fw"></i>
                    </span>
                    Não
                @endif
              </div>
            </div>

            <div class="row mb-3">
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <h5> {{ __('Description') }}: </h5>
                    <label>{{ $event->description }}</label>
                </div>
            </div>

            <hr>

            <div class="mb-3 d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="{{ url()->previous() }}">
                  <button type="button" class="btn btn-primary">Voltar</button>
                </a>
                <a href="{{ route('dashboard.membership.events.edit', $event->id) }}">
                  <button type="button" class="btn btn-outline-secondary ms-1">Editar</button>
                </a>
              </div>

              <div class="btn-group me-3">
              </div>
            </div>
        </div>
    </div>

</x-app-layout>

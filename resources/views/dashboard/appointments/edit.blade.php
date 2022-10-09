<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Appointment') . ' - ' . $appointment->name }}
    </x-slot>

    <div class="row">
        <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    {{ __('Editar Informações do Compromisso') }}
                </div>
                <div class="card-body">
                    <x-error-alert />
                    <form action="{{ route('dashboard.appointments.update', $appointment) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nome</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ $appointment->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="happens_at" class="col-md-4 col-form-label text-md-end">Data e Hora</label>

                            <div class="col-md-6">
                                <input id="happens_at" type="datetime-local"
                                    class="form-control @error('happens_at') is-invalid @enderror" name="happens_at"
                                    value="{{ date('Y-m-d\TH:i', strtotime($appointment->happens_at)) }}" required>

                                @error('happens_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="add_info" class="col-md-4 col-form-label text-md-end">Outras Informações</label>

                            <div class="col-md-8">
                                <textarea id="add_info" type="text" class="form-control" name="add_info" rows="6">{{ $appointment->add_info }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="completed" class="col-md-4 col-form-label text-md-end">Completado?</label>
                            <div class="col-md-6 mt-2 ms-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="completed" id="completedTrue"
                                        value="1" @if ($appointment->completed === 1) checked @endif>
                                    <label class="form-check-label" for="completedTrue">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="completed" id="completedFalse"
                                        value="0" @if ($appointment->completed === 0) checked @endif>
                                    <label class="form-check-label" for="completedFalse">Não</label>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="button-group float-end">
                            <button type="submit" class="btn btn-success">
                                {{ __('Salvar') }}
                            </button>
                            <a href="{{ route('dashboard.appointments.index') }}" class="btn btn-outline-secondary">
                                {{ __('Cancelar') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        {{ __('Appointment') . " - " . $appointment->name }}
    </x-slot>

    <div class="col-md-6">
        <label>Nome: {{ $appointment->name }}</label><br>
        <label>Data e Hora: {{ $appointment->happens_at }}</label><br>
        <label>Outras Informações: {{ $appointment->add_info }}</label><br>
        <hr>
        <a href="{{ route('dashboard.appointments.index') }}">
            <button type="button" class="btn btn-light float-right">Voltar</button>
        </a>
    </div>

</x-app-layout>


<x-app-layout>
    <x-slot name="header">
        {{ __('Member') . " - " . $member->name }}
    </x-slot>

    <div class="col-md-10 ml-3">
        <div class="row mb-3">
          <div class="col-md-4">
            <h5> {{ __('Name') }}: </h5>
            <label>{{ $member->name }}</label>
          </div>
          <div class="col-md-2">
            <h5> {{ __('Gender') }}: </h5>
            <label>{{ $member->gender == 0 ? __('Male') : __('Female') }}</label>
          </div>
          <div class="col-md-3">
            <h5> {{ __('Date of Birth') }}: </h5>
            <label>{{ date('d / m / Y', strtotime($member->birth)) }}</label>
          </div>
          <div class="col-md-3">
            <h5> {{ __('Phone') }}: </h5>
            <label>{{ $member->phone }}</label>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <h5> {{ __('Email') }}: </h5>
            <label>{{ $member->email }}</label>
          </div>
          <div class="col-md-8">
            <h5> {{ __('Address') }}: </h5>
            <label>{{ $member->address }}</label>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <h5> {{ __('Member Situation') }}: </h5>
            <label>{{ $member->isActive() ? __('Active') : __('Inactive') }}</label>
          </div>
          <div class="col-md-4">
            <h5> {{ __('Admission Date') }}: </h5>
            <label>{{ date('d / m / Y', strtotime($member->admission)) }}</label>
          </div>
          <div class="col-md-4">
            @isset($member->demission)
              <h5> {{ __('Demission Date') }}: </h5>
              <label>{{ date('d / m / Y', strtotime($member->demission)) }}</label>
            @endisset
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <h5> {{ __('Congregation') }}: </h5>
            <label>{{ $member->congregation->name }}</label>
          </div>
          <div class="col-md-4">
            @isset($member->classroom)
              <h5> {{ __('Classroom') }}: </h5>
              <label>{{ $member->classroom->name }}</label>
            @endisset
          </div>
        </div>
        <hr>
        <div class="mb-3 d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <a href="{{ url()->previous() }}">
              <button type="button" class="btn btn-primary">Voltar</button>
            </a>
            <a href="{{ route('dashboard.members.edit', $member) }}">
              <button type="button" class="btn btn-outline-secondary ml-1">Editar</button>
            </a>
          </div>

          <div class="btn-group me-3">
            <a href="{{ route('dashboard.members.individual-report', $member) }}" class="btn btn-outline-secondary">
              Exportar em PDF
            </a>
          </div>
        </div>

    </div>

</x-app-layout>

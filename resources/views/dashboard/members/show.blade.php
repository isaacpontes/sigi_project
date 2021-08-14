<x-app-layout>
    <x-slot name="header">
        {{ __('Member') . " - " . $member->name }}
    </x-slot>

    <div class="row">
        <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <div class="card mb-4">
                <div class="card-header">Informações do Membro</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                        <h6> {{ __('Nome') }}: </h6>
                        <h5>{{ $member->name }}</h5>
                        </div>
                        <div class="col-md-2">
                        <h6> {{ __('Gênero') }}: </h6>
                        <h5>{{ $member->gender == 0 ? __('Male') : __('Female') }}</h5>
                        </div>
                        <div class="col-md-3">
                        <h6> {{ __('Data de Nascimento') }}: </h6>
                        <h5>{{ date('d / m / Y', strtotime($member->birth)) }}</h5>
                        </div>
                        <div class="col-md-3">
                        <h6> {{ __('Telefone') }}: </h6>
                        <h5>{{ $member->phone }}</h5>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                        <h6> {{ __('Email') }}: </h6>
                        <h5>{{ $member->email }}</h5>
                        </div>
                        <div class="col-md-8">
                        <h6> {{ __('Endereço') }}: </h6>
                        <h5>{{ $member->address }}</h5>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                        <h6> {{ __('Situação do Membro') }}: </h6>
                        <h5>{{ $member->isActive() ? __('Active') : __('Inactive') }}</h5>
                        </div>
                        <div class="col-md-4">
                        <h6> {{ __('Data de Admissão') }}: </h6>
                        <h5>{{ date('d / m / Y', strtotime($member->admission)) }}</h5>
                        </div>
                        <div class="col-md-4">
                        @isset($member->demission)
                            <h6> {{ __('Data de Desligamento') }}: </h6>
                            <h5>{{ date('d / m / Y', strtotime($member->demission)) }}</h5>
                        @endisset
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                        <h6> {{ __('Congregação') }}: </h6>
                        <h5>{{ $member->congregation->name }}</h5>
                        </div>
                        <div class="col-md-4">
                        @isset($member->classroom)
                            <h6> {{ __('Classe') }}: </h6>
                            <h5>{{ $member->classroom->name }}</h5>
                        @endisset
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="button-group">
                            <a href="{{ route('dashboard.membership.members.index') }}" class="btn btn-primary">
                                {{ __('Voltar') }}
                            </a>
                            <a href="{{ route('dashboard.membership.members.edit', $member) }}" class="btn btn-outline-secondary">
                                {{ __('Editar') }}
                            </a>
                        </div>

                        <div class="btn-group">
                            <a href="{{ route('dashboard.membership.members.individual-report', $member) }}" class="btn btn-outline-secondary">
                                {{ __('Exportar em PDF') }}
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>

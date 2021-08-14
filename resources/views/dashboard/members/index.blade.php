<x-app-layout>
    <x-slot name="header">
        {{ __('Members') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
        {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        Total de Membros:
                    </h5>
                    <h5 class="mb-0">
                        {{ $active_members->total() }}
                    </h5>
                </div>
            </div>
            {{-- <h5 class="mb-0">
            Membros Inativos: {{ $inactive_members->total() }}
            </h5> --}}
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        Novos Membros Este Ano:
                    </h5>
                    <h5 class="mb-0">
                        {{ $active_members_this_year }}
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        Membros Desligados Este Ano:
                    </h5>
                    <h5 class="mb-0">
                        {{ $inactive_members_this_year }}
                    </h5>
                </div>
            </div>
        </div>

    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-7 d-flex align-items-center justify-content-start mb-4">
                    <h3 class="card-title pt-2 pe-4">{{ __('Active Members') }}</h3>
                    <a href="{{ route('dashboard.membership.members.create') }}" class="btn btn-primary">{{ __('Add Member') }}</a>
                </div>
                <div class="col-md-5 mb-4">
                    <div class="btn-group float-end">
                        <a href="{{ route('dashboard.membership.members.simple-report') }}" class="btn btn-outline-secondary">Exportar em PDF</a>
                        <a href="{{ route('dashboard.membership.members.anual-report') }}" class="btn btn-outline-secondary">Resumo</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table  ">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($active_members as $member)
                        <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->email }}</td>
                        <td class="d-flex">
                            <a href="{{ route('dashboard.membership.members.show', $member->id) }}">
                            <button type="button" class="btn btn-outline-info me-2 py-0">
                                <span>
                                {{ __('Details') }}
                                </span>
                            </button>
                            </a>
                            <a href="{{ route('dashboard.membership.members.edit', $member->id) }}">
                            <button type="button" class="btn btn-outline-secondary me-2 py-0">
                                <span>
                                {{ __('Edit') }}
                                </span>
                            </button>
                            </a>
                            <a href="{{ route('dashboard.membership.members.demit', $member->id) }}">
                            <button type="button" class="btn btn-outline-danger me-2 py-0">
                                <span>
                                {{ __('Demit') }}
                                </span>
                            </button>
                            </a>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $active_members->links() }}
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-7 d-flex align-items-center justify-content-start mb-4">
                    <h3 class="card-title pt-2 pe-4">{{ __('Inactive Members') }}</h3>
                </div>
                <div class="col-md-5 mb-4">
                    <div class="btn-group float-end">
                        <a href="{{ route('dashboard.membership.members.inactives-report') }}" class="btn btn-outline-secondary">Exportar em PDF</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table  ">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inactive_members as $member)
                        <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->email }}</td>
                        <td class="d-flex">
                        <a href="{{ route('dashboard.membership.members.show', $member->id) }}">
                            <button type="button" class="btn btn-outline-info me-2 py-0">
                            <span>
                                {{ __('Details') }}
                            </span>
                            </button>
                        </a>
                        <form action="{{ route('dashboard.membership.members.readmit', $member->id) }}" method="post">
                            @csrf
                            {{ method_field('put') }}
                            <button type="submit" class="btn btn-outline-success py-0">
                            <span>
                                {{ __('Readmit') }}
                            </span>
                            </button>
                        </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $inactive_members->links() }}
            </div>
            <hr>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3>Relatório Personalizado</h3>
            <p>
                O relatório de membresia consiste em um balanço das entradas e saídas de membros no período selecionado.
            </p>
            <form action="{{ route('dashboard.membership.members.custom-report') }}" method="GET">
                <div class="row align-items-end">
                    <div class="col-md-4 mb-3">
                        <label for="initial_date">Data Inicial</label>
                        <input id="initial_date" type="date" class="form-control" name="initial_date" required>
                        <div class="invalid-feedback">
                            {{ __('Please enter a valid initial date for the report.') }}
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="final_date">Data Final</label>
                        <input id="final_date" type="date" class="form-control" name="final_date" required>
                        <div class="invalid-feedback">
                            {{ __('Please enter a valid final date for the report.') }}
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <button type="submit" class="btn btn-primary">Gerar PDF</button>
                    </div>
                </div>
            </form>
            <hr>
        </div>
    </div>

</x-app-layout>

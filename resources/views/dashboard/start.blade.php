<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <h2>Olá, {{ auth()->user()->name }}!</h2>
    You're logged in! And this is the start page.

    <div class="row mt-4">
        <div class="col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="fs-5 mb-0">
                        Compromissos Hoje
                    </h2>
                    <p class="fs-1 text-center mt-4 mb-3">
                        {{ $appointments->count() }}
                    </p>
                    <p class="text-end my-0">
                        <a href="{{ route('dashboard.appointments.index') }}">
                            Ver todos
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="fs-5 mb-0">
                        Congregações
                    </h2>
                    <p class="fs-1 text-center mt-4 mb-3">
                        {{ $congregations->count() }}
                    </p>
                    <p class="text-end my-0">
                        <a href="{{ route('dashboard.congregations.index') }}">
                            Ver todas
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="fs-5 mb-0">
                        Membros
                    </h2>
                    <p class="fs-1 text-center mt-4 mb-3">
                        {{ $active_members->count() }}
                    </p>
                    <p class="text-end my-0">
                        <a href="{{ route('dashboard.membership.members.index') }}">
                            Ver todos
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="fs-5 mb-0">
                        Contas
                    </h2>
                    <p class="fs-1 text-center mt-4 mb-3">
                        {{ $accounts->count() }}
                    </p>
                    <p class="text-end my-0">
                        <a href="{{ route('dashboard.finances.accounts.index') }}">
                            Ver todas
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

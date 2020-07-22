@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Secretaria</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="dropdown-item" href="{{ route('dashboard.congregations.index') }}">
                        Gerenciar Congregações
                    </a>
                    <a class="dropdown-item" href="{{ route('dashboard.classrooms.index') }}">
                        Gerenciar Classes
                    </a>
                    <a class="dropdown-item" href="{{ route('dashboard.members.index') }}">
                        Gerenciar Membros
                    </a>
                    <a class="dropdown-item" href="{{ route('dashboard.events.index') }}">
                        Gerenciar Eventos
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Tesouraria</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="dropdown-item" href="{{ route('dashboard.accounts.index') }}">
                        Gerenciar Contas
                    </a>
                    <a class="dropdown-item" href="{{ route('dashboard.income_categories.index') }}">
                        Gerenciar Categorias de Receitas
                    </a>
                    <a class="dropdown-item" href="{{ route('dashboard.expense_categories.index') }}">
                        Gerenciar Categorias de Despesas
                    </a>
                    <a class="dropdown-item" href="{{ route('dashboard.incomes.index') }}">
                        Gerenciar Receitas
                    </a>
                    <a class="dropdown-item" href="{{ route('dashboard.expenses.index') }}">
                        Gerenciar Despesas
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Usuário</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="dropdown-item" href="{{ route('dashboard.schedules.index') }}">
                        Gerenciar Compromissos
                    </a>
                    <hr>
                    @can('manage-churches')
                        <a class="dropdown-item" href="{{ route('dashboard.churches.index') }}">
                            Gerenciar Igrejas
                        </a>
                    @endcan

                    @can('manage-users')
                        <a class="dropdown-item" href="{{ route('dashboard.users.index') }}">
                            Gerenciar Usuários
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <hr>
                    <a class="dropdown-item" href="{{ route('dashboard.congregations.index') }}">
                        Gerenciar Congregações
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
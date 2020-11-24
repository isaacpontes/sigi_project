@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto bg-white col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $member->name }}</h1>
        </div>

        <div class="col-md-6">
            <label>
                <strong>Nome: </strong>
                {{ $member->name }}
            </label>
            <br>
            <label>
                <strong>Gênero: </strong>
                {{ $member->gender }}
            </label>
            <br>
            <label>
                <strong>Data de Nascimento: </strong>
                {{ $member->birth }}
            </label>
            <br>
            <label>
                <strong>Email: </strong>
                {{ $member->email }}
            </label>
            <br>
            <label>
                <strong>Telefone: </strong>
                {{ $member->phone }}
            </label>
            <br>
            <label>
                <strong>Endereço: </strong>
                {{ $member->address }}
            </label>
            <br>
            <label>
                <strong>Situação: </strong>
                {{ $member->status }}
            </label>
            <br>
            <label>
                <strong>Admissão por: </strong>
                {{ $member->admission }}
            </label>
            <br>
            <label>
                <strong>Data de Admissão: </strong>
                {{ $member->admission_date }}
            </label>
            <br>
            @isset($member->demission)
                <label>
                    <strong>Desligamento: </strong>
                    {{ $member->demission }}
                </label>
                <br>
            @endisset
            @isset($member->demission_date)
                <label>
                    <strong>Data de Desligamento: </strong>
                    {{ $member->demission_date }}
                </label>
                <br>
            @endisset
            @isset($member->add_info)
                <label>
                    <strong>Informações Adicionais: </strong>
                    {{ $member->add_info }}
                </label>
                <br>
            @endisset
            @isset($member->classroom)
                <label>
                    <strong>Classe: </strong>
                    {{ $member->classroom->name }}
                </label>
                <br>
            @endisset
            <label>
                <strong>Congregação: </strong>
                {{ $member->congregation->name }}
            </label>
            <br>
            <hr>
            <a href="{{ route('dashboard.members.index') }}">
                <button type="button" class="btn btn-light float-right">Voltar</button>
            </a>

        </div>
    </main>
@endsection

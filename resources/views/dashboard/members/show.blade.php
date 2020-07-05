@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ $member->name }}</div>

                <div class="card-body">
                    <label>Nome: {{ $member->name }}</label><br>
                    <label>Gênero: {{ $member->gender }}</label><br>
                    <label>Data de Nascimento: {{ $member->birth }}</label><br>
                    <label>Email: {{ $member->email }}</label><br>
                    <label>Telefone: {{ $member->phone }}</label><br>
                    <label>Endereço: {{ $member->address }}</label><br>
                    <label>Ocupação: {{ $member->ocupation }}</label><br>
                    <label>Situação: {{ $member->status }}</label><br>
                    <label>Admissão por: {{ $member->admission }}</label><br>
                    <label>Data de Admissão: {{ $member->admission_date }}</label><br>
                    <label>Saída por: {{ $member->demission }}</label><br>
                    <label>Data de Saída: {{ $member->demission_date }}</label><br>
                    <label>Local de Batismo: {{ $member->baptism_place }}</label><br>
                    <label>Data de Batismo: {{ $member->baptism_date }}</label><br>
                    <label>Informações Adicionais: {{ $member->add_info }}</label><br>
                    <label>Classe: {{ $member->classroom->name }}</label><br>
                    <label>Congregação: {{ $member->congregation->name }}</label><br>
                    <label>Igreja: {{ $member->church->name }}</label><br>
                    <hr>
                    <a href="{{ route('dashboard.members.index') }}">
                        <button type="button" class="btn btn-light float-right">Voltar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastrar Novo Membro</div>

                <div class="card-body">
                  <form action="{{ route('dashboard.members.store') }}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="congregation" class="col-md-4 col-form-label text-md-right">Congregação</label>

                        <select id="congregation" class="col-md-4 offset-md-1 form-control" name="congregation_id" required autofocus>
                            @foreach ($congregations as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group row">
                        <label for="classroom" class="col-md-4 col-form-label text-md-right">Classe</label>

                        <select id="classroom" class="col-md-4 offset-md-1 form-control" name="classroom_id" required autofocus>
                            @foreach ($classrooms as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">Gênero</label>

                        <div class="col-md-2 offset-md-1 form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender0" value="0">
                            <label class="form-check-label" for="inlineRadio1">Feminino</label>
                        </div>
                        <div class="col-md-2 form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender1" value="1">
                            <label class="form-check-label" for="inlineRadio2">Masculino</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birth" class="col-md-4 col-form-label text-md-right">Data de Nascimento</label>

                        <div class="col-md-4">
                            <input id="birth" type="date" class="form-control" name="birth" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">Telefone</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control" name="phone" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">Endereço</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Situação</label>

                        <div class="offset-md-1 form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status0" value="0">
                            <label class="form-check-label" for="status0">Ativo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status1" value="1">
                            <label class="form-check-label" for="status1">Afastado</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status2" value="2">
                            <label class="form-check-label" for="status2">Inativo</label>
                        </div>
                        <!--<div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status3" value="3">
                            <label class="form-check-label" for="status3">...</label>
                        </div>-->
                    </div>

                    <div class="form-group row">
                        <label for="admission" class="col-md-4 col-form-label text-md-right">Admissão Por</label>

                        <select id="admission" class="col-md-4 offset-md-1 form-control" name="admission" required autofocus>
                            <option value="0"></option>
                            <option value="1">Aclamação</option>
                            <option value="2">Batismo</option>
                            <option value="3">Reconciliação</option>
                            <option value="4">Transferência</option>
                        </select>

                    </div>

                    <div class="form-group row">
                        <label for="admission_date" class="col-md-4 col-form-label text-md-right">Data de Admissão</label>

                        <div class="col-md-4">
                            <input id="admission_date" type="date" class="form-control" name="admission_date" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="add_info" class="col-md-4 col-form-label text-md-right">Informações Adicionais</label>

                        <div class="col-md-6">
                            <textarea id="add_info" type="add_info" class="form-control" name="add_info"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Cadastrar
                    </button>
                    <a href="{{ route('dashboard.members.index') }}">
                        <button type="button" class="btn btn-light">Cancelar</button>
                    </a>

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

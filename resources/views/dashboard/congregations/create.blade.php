@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastrar Nova Congregação</div>

                <div class="card-body">
                  <form action="{{ route('dashboard.congregations.store') }}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">Telefone</label>

                        <div class="col-md-6">
                            <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">Endereço</label>

                        <div class="col-md-6">
                            <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" required autofocus>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="add_info" class="col-md-4 col-form-label text-md-right">Informações Adicionais</label>

                        <div class="col-md-6">
                            <textarea id="add_info" type="add_info" class="form-control @error('add_info') is-invalid @enderror" name="add_info"></textarea>

                            @error('add_info')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Cadastrar
                    </button>
                    <a href="{{ route('dashboard.congregations.index') }}">
                        <button type="button" class="btn btn-light">Cancelar</button>
                    </a>
                    
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

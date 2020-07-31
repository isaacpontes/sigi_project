@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastrar Novo Perfil</div>

                <div class="card-body">
                  <form action="{{ route('dashboard.roles.store') }}" method="post">
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

                    <button type="submit" class="btn btn-primary">
                        Cadastrar
                    </button>
                    <a href="{{ route('dashboard.roles.index') }}">
                        <button type="button" class="btn btn-light">Cancelar</button>
                    </a>

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

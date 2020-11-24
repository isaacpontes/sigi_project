@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Página Inicial</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Visitante, seja bem-vindo. Esta é a página inicial do site, faça login para continuar.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

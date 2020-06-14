@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ $congregation->name }}</div>

                <div class="card-body">
                    <label>{{ $congregation->phone }}</label><br>
                    <label>{{ $congregation->address }}</label><br>
                    <label>{{ $congregation->add_info }}</label><br>
                    <label>{{ $congregation->church->name }}</label><br>
                    <hr>
                    <a href="{{ route('dashboard.congregations.index') }}">
                        <button type="button" class="btn btn-light float-right">Voltar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ $classroom->name }}</div>

                <div class="card-body">
                    <label>{{ $classroom->add_info }}</label><br>
                    <label>{{ $classroom->church->name }}</label><br>
                    <hr>
                    <a href="{{ route('dashboard.classrooms.index') }}">
                        <button type="button" class="btn btn-light float-right">Voltar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

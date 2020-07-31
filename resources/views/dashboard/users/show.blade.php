@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    <label>{{ $user->name }}</label><br>
                    <label>{{ $user->email }}</label><br>
                    <label>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</label><br>
                    <label>{{ $user->church->name }}</label><br>
                    <hr>
                    <a href="{{ route('home') }}">
                        <button type="button" class="btn btn-light float-right">Voltar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Classes de EBD</div>

                <div class="card-body">

                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($classrooms as $classroom)
                    <tr>
                      <th scope="row">{{ $classroom->id }}</th>
                      <td>
                        <a href="{{ route('dashboard.classrooms.show', $classroom->id) }}">
                          {{ $classroom->name }}
                        </a>
                      </td>
                      <td>
                        <a href="{{ route('dashboard.classrooms.show', $classroom->id) }}">
                            <button type="button" class="btn btn-sm btn-info float-left">Detalhes</button>
                        </a>
                        <a href="{{ route('dashboard.classrooms.edit', $classroom->id) }}">
                          <button type="button" class="btn btn-sm btn-warning float-left">Editar</button>
                        </a>
                        <form action="{{ route('dashboard.classrooms.destroy', $classroom) }}" method="post" class="float-left">
                          @csrf
                          {{ method_field('delete') }}
                          <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                  </table>

                  <a href="{{ route('dashboard.classrooms.create') }}"><button type="button" class="btn btn-primary float-right">Cadastrar Classe</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

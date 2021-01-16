<x-app-layout>
  <x-slot name="header">
    {{ __('Members') }}
  </x-slot>

  @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  @endif


  <div class="row">
    <div class="col-sm-6">
      <div class="pb-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('dashboard.members.create') }}" class="btn btn-sm btn-primary">{{ __('Add Member') }}</a>

        <div class="btn-group me-3">
          <a href="{{ route('dashboard.members.simple-report') }}" class="btn btn-sm btn-outline-secondary">Exportar em PDF</a>
          <a href="{{ route('dashboard.members.anual-report') }}" class="btn btn-sm btn-outline-secondary">Resumo Anual</a>
          <a href="#customReport" class="btn btn-sm btn-outline-secondary">Relatório</a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Telefone</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach($active_members as $member)
              <tr>
                <td>{{ $member->name }}</td>
                <td>{{ $member->phone }}</td>
                <td class="d-flex">
                <a href="{{ route('dashboard.members.show', $member->id) }}">
                  <button type="button" class="btn btn-sm btn-secondary mr-2">
                    <span>
                      <i class="far fa-file-alt"></i>
                    </span>
                  </button>
                </a>
                <a href="{{ route('dashboard.members.edit', $member->id) }}">
                  <button type="button" class="btn btn-sm btn-light mr-2">
                    <span>
                      <i class="fa fa-edit"></i>
                    </span>
                  </button>
                </a>
                <form action="{{ route('dashboard.members.destroy', $member->id) }}" method="post">
                  @csrf
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-sm btn-danger">
                    <span>
                      <i class="fa fa-trash-alt"></i>
                    </span>
                  </button>
                </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $active_members->links() }}
      </div>
      <hr>
    </div>

    <div class="col-sm-6 pl-4">
      <div class="pb-3 d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Membros Inativos</h4>

        <div class="btn-group me-1">
          <a href="{{ route('dashboard.members.inactives-report') }}" class="btn btn-sm btn-outline-secondary">Exportar em PDF</a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Telefone</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach($inactive_members as $member)
              <tr>
                <td>{{ $member->name }}</td>
                <td>{{ $member->phone }}</td>
                <td class="d-flex">
                <a href="{{ route('dashboard.members.show', $member->id) }}">
                  <button type="button" class="btn btn-sm btn-secondary mr-2">
                    <span>
                      <i class="far fa-file-alt"></i>
                    </span>
                  </button>
                </a>
                <a href="{{ route('dashboard.members.edit', $member->id) }}">
                  <button type="button" class="btn btn-sm btn-light mr-2">
                    <span>
                      <i class="fa fa-edit"></i>
                    </span>
                  </button>
                </a>
                <form action="{{ route('dashboard.members.destroy', $member->id) }}" method="post">
                  @csrf
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-sm btn-danger">
                    <span>
                      <i class="fa fa-trash-alt"></i>
                    </span>
                  </button>
                </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $inactive_members->links() }}
      </div>
    </div>
  </div>
  <hr>
  <div class="row mb-5">
    <div id="customReport" class="col-md-6">
      <h2>Relatório Personalizado</h2>
      <p>
        O relatório de membresia consiste em um balanço das entradas e saídas de membros no período selecionado.
      </p>

      <form action="{{ route('dashboard.members.custom-report') }}" method="GET">
        <div class="mb-3">
          <label for="initial_date">Data Inicial</label>
          <input id="initial_date" type="date" class="form-control" name="initial_date" required>
          <div class="invalid-feedback">
            {{ __('Please enter a valid initial date for the report.') }}
          </div>
        </div>
        <div class="mb-3">
          <label for="final_date">Data Final</label>
          <input id="final_date" type="date" class="form-control" name="final_date" required>
          <div class="invalid-feedback">
            {{ __('Please enter a valid final date for the report.') }}
          </div>
        </div>
        <button type="submit" class="btn btn-sm btn-primary my-1">Gerar PDF</button>
      </form>
    </div>
  </div>

</x-app-layout>

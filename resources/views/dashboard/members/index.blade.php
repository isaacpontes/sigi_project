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
    <div class="col-sm-4">
      <h3 class="my-1">Resumo</h3>

      <div class="my-3 me-5">
        <h5>
          Total de Membros: {{ $active_members->total() }}
        </h5>
        {{-- <h5>
          Membros Inativos: {{ $inactive_members->total() }}
        </h5> --}}
      </div>
      
      <div class="my-3 me-5">
        <h5>
          Neste Ano
        </h5>
        <div>
          <div>Novos Membros: {{ $active_members_this_year }}</div>
          <div>Membros Desligados: {{ $inactive_members_this_year }}</div>
        </div>
      </div>

      <hr>
      <h3>Relatório Personalizado</h3>
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

            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary my-1">Gerar PDF</button>
            </div>
          </form>
      <hr>
    </div>

    <div class="col-sm-8 pl-4">
      <div class="pb-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('dashboard.members.create') }}" class="btn btn-primary">{{ __('Add Member') }}</a>

        <div class="btn-group me-3">
          <a href="{{ route('dashboard.members.simple-report') }}" class="btn btn-outline-secondary">Exportar em PDF</a>
          <a href="{{ route('dashboard.members.anual-report') }}" class="btn btn-outline-secondary">Resumo</a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table  ">
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
                    <button type="button" class="btn btn-outline-primary me-2 py-0">
                      <span>
                        {{ __('Details') }}
                      </span>
                    </button>
                  </a>
                  <a href="{{ route('dashboard.members.edit', $member->id) }}">
                    <button type="button" class="btn btn-outline-secondary me-2 py-0">
                      <span>
                        {{ __('Edit') }}
                      </span>
                    </button>
                  </a>
                  <a href="{{ route('dashboard.members.demit', $member->id) }}">
                    <button type="button" class="btn btn-outline-danger me-2 py-0">
                      <span>
                        {{ __('Demit') }}
                      </span>
                    </button>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $active_members->links() }}
      </div>
      <div class="pb-3 d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Membros Inativos</h4>

        <div class="btn-group me-1">
          <a href="{{ route('dashboard.members.inactives-report') }}" class="btn btn-outline-secondary">Exportar em PDF</a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table  ">
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
                  <button type="button" class="btn btn-outline-primary me-2 py-0">
                    <span>
                      {{ __('Details') }}
                    </span>
                  </button>
                </a>
                <form action="{{ route('dashboard.members.readmit', $member->id) }}" method="post">
                  @csrf
                  {{ method_field('put') }}
                  <button type="submit" class="btn btn-outline-success py-0">
                    <span>
                      {{ __('Readmit') }}
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

</x-app-layout>

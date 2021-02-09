<x-app-layout>
    <x-slot name="header">
        {{ __('Classroom') . " - " . $classroom->name }}
    </x-slot>

    <div class="row">
        <div class="col-md-4">
            <div class="row mb-3">
                <div class="col-md-6">
                  <h5> {{ __('Total de Alunos') }}: </h5>
                  <label>{{ $active_members->total() }}</label>
                </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <h5> {{ __('Additional Information') }}: </h5>
                <label>{{ $classroom->add_info }}</label>
              </div>
            </div>
            <hr>
            <div class="mb-3 d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="{{ route('dashboard.classrooms.index') }}">
                  <button type="button" class="btn btn-primary">Voltar</button>
                </a>
                <a href="{{ route('dashboard.classrooms.edit', $classroom) }}">
                  <button type="button" class="btn btn-outline-secondary ml-1">Editar</button>
                </a>
              </div>
    
              <div class="btn-group me-3">
                {{-- <a href="{{ route('dashboard.classrooms.individual-report', $classroom) }}" class="btn btn-outline-secondary">
                  Exportar em PDF
                </a> --}}
              </div>
            </div>
    
        </div>
        <div class="col-md-8">
            <h5 class="mb-3">Alunos da Classe</h5>
          <div class="table-responsive">
            <table class="table table-striped">
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
                        <button type="button" class="btn btn-outline-primary mr-2 py-0">
                          <span>
                            {{ __('Details') }}
                          </span>
                        </button>
                      </a>
                      <a href="{{ route('dashboard.members.edit', $member->id) }}">
                        <button type="button" class="btn btn-outline-secondary mr-2 py-0">
                          <span>
                            {{ __('Edit') }}
                          </span>
                        </button>
                      </a>
                      {{-- <a href="{{ route('dashboard.members.demit', $member->id) }}">
                        <button type="button" class="btn btn-outline-danger mr-2 py-0">
                          <span>
                            {{ __('Demit') }}
                          </span>
                        </button>
                      </a> --}}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $active_members->links() }}
          </div>
        </div>
    </div>

</x-app-layout>

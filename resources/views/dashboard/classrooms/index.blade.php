<x-app-layout>
    <x-slot name="header">
        {{ __('Classrooms') }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
          <div class="pb-3 d-flex justify-content-between align-items-center">
            <a href="{{ route('dashboard.classrooms.create') }}" class="btn btn-primary">{{ __('Add Classroom') }}</a>
    
            <div class="btn-group me-3">
              <a href="{{ route('dashboard.pdf-list.classrooms') }}" class="btn btn-outline-secondary">Exportar em PDF</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table  ">
              <thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach($classrooms as $classroom)
                  <tr>
                    <td>{{ $classroom->name }}</td>
                    <td class="d-flex">
                      <a href="{{ route('dashboard.classrooms.show', $classroom->id) }}">
                        <button type="button" class="btn btn-outline-primary me-2 py-0">
                          <span>
                            {{ __('Details') }}
                          </span>
                        </button>
                      </a>
                      <a href="{{ route('dashboard.classrooms.edit', $classroom->id) }}">
                        <button type="button" class="btn btn-outline-secondary me-2 py-0">
                          <span>
                            {{ __('Edit') }}
                          </span>
                        </button>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      <hr>
    </div>

</x-app-layout>

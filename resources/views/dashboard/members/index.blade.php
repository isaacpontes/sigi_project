<x-app-layout>
  <x-slot name="header">
    {{ __('Members') }}
  </x-slot>

  @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  @endif

  <div class="pb-3 d-flex justify-content-between align-items-center">
    <a href="{{ route('dashboard.members.create') }}" class="btn btn-sm btn-primary">Cadastrar Membro</a>

    <div class="btn-group me-3">
      <a href="{{ route('dashboard.members.pdf') }}" class="btn btn-sm btn-outline-secondary">Exportar em PDF</a>
      <a href="#" class="btn btn-sm btn-outline-secondary">Relatório Mensal</a>
      <a href="#" class="btn btn-sm btn-outline-secondary">Relatório Anual</a>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Telefone</th>
          <th scope="col">Email</th>
          <th scope="col">Congregação</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($members as $member)
          <tr>
            <td>{{ $member->name }}</td>
            <td>{{ $member->phone }}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->congregation->name }}</td>
            <td>
            <a href="{{ route('dashboard.members.show', $member->id) }}">
              <button type="button" class="btn btn-sm btn-secondary mr-2 float-left">Detalhes</button>
            </a>
            <a href="{{ route('dashboard.members.edit', $member->id) }}">
              <button type="button" class="btn btn-sm btn-light mr-2 float-left">Editar</button>
            </a>
            <form action="{{ route('dashboard.members.destroy', $member->id) }}" method="post" class="float-left">
              @csrf
              {{ method_field('delete') }}
              <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
            </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $members->links() }}
  </div>

</x-app-layout>

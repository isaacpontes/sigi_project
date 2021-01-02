<div role="main">
  <div>
    <h2>Membros</h2>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-md">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Telefone</th>
          <th scope="col">Congregação</th>
        </tr>
      </thead>
      <tbody>
        @foreach($members as $member)
          <tr>
          <td>{{ $member->name }}</td>
          <td>{{ $member->phone }}</td>
          <td>{{ $member->congregation->name }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<html>
<head>
  <style>
    @page {
      margin: 72px 16px;
    }
    * {
      font-family: 'Open Sans', sans-serif;
    }
    header {
      position: fixed;
      top: -60px;
      left: 0px;
      right: 0px;
      height: 50px;
    }

    footer {
      position: fixed;
      bottom: -60px;
      left: 0px;
      right: 0px;
      height: 16px;
      /** Extra personal styles **/
      background-color: #555555;
      color: #eaeaea;
      font-size: 11px;
      text-align: right;
      padding: 5px;
    }
    .ml-lg {
      margin-left: 64px;
    }
    thead {
      background-color: #555555;
      color: #eaeaea;
      font-weight: 600;
    }
    th, td {
      padding: 6px;
      font-size: 12px;
    }
    .center {
      margin-left: auto;
      margin-right: auto;
    }
    .text-center {
      text-align: center;
    }
  </style>
</head>
<body>
  <header class="text-center">
    <h2>{{ Auth::user()->church->name }}</h2>
  </header>
  <footer>
      Gerado com SiGI - Copyright &copy; <?php echo date("Y");?>
  </footer>
  <div>
    <h3 class="text-center">Relatório Anual de Membresia - Ano de {{ $current_year }}</h3>
    <p class="ml-lg">Total de membros: {{ $active_members->count() }}</p>
    <p class="ml-lg">Novos membros este ano: {{ $new_members->count() }}</p>
    <p class="ml-lg">Membros desligados este ano: {{ $new_inactive_members->count() }}</p>
    <hr>
    <h4 class="ml-lg">Novos Membros</h4>
    <table class="ml-lg">
      <thead class="text-center">
        <tr>
          <th>Nome</th>
          <th>Telefone</th>
          <th>Nascimento</th>
          <th>Admissão</th>
          <th>Congregação</th>
        </tr>
      </thead>
      <tbody>
        @foreach($new_members as $member)
          <tr>
            <td>{{ $member->name }}</td>
            <td>{{ $member->phone }}</td>
            <td class="text-center">{{ date("d / m / Y", strtotime($member->birth))  }}</td>
            <td class="text-center">{{ date("d / m / Y", strtotime($member->admission))  }}</td>
            <td>{{ $member->congregation->name }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <hr>
    <h4 class="ml-lg">Membros Desligados</h4>
    <table class="ml-lg">
      <thead class="text-center">
        <tr>
          <th>Nome</th>
          <th>Telefone</th>
          <th>Nascimento</th>
          <th>Desligamento</th>
          <th>Congregação</th>
        </tr>
      </thead>
      <tbody>
        @foreach($new_inactive_members as $member)
          <tr>
            <td>{{ $member->name }}</td>
            <td>{{ $member->phone }}</td>
            <td class="text-center">{{ date("d / m / Y", strtotime($member->birth))  }}</td>
            <td class="text-center">{{ date("d / m / Y", strtotime($member->demission))  }}</td>
            <td>{{ $member->congregation->name }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <hr>
    <h4 class="ml-lg">Membros Ativos</h4>
    <table class="ml-lg">
      <thead class="text-center">
        <tr>
          <th>Nome</th>
          <th>Telefone</th>
          <th>Nascimento</th>
          <th>Admissão</th>
          <th>Congregação</th>
        </tr>
      </thead>
      <tbody>
        @foreach($active_members as $member)
          <tr>
            <td>{{ $member->name }}</td>
            <td>{{ $member->phone }}</td>
            <td class="text-center">{{ date("d / m / Y", strtotime($member->birth))  }}</td>
            <td class="text-center">{{ date("d / m / Y", strtotime($member->admission))  }}</td>
            <td>{{ $member->congregation->name }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <hr>
    <h4 class="ml-lg">Total de Membros Desligados</h4>
    <table class="ml-lg">
      <thead class="text-center">
        <tr>
          <th>Nome</th>
          <th>Telefone</th>
          <th>Nascimento</th>
          <th>Desligamento</th>
          <th>Congregação</th>
        </tr>
      </thead>
      <tbody>
        @foreach($inactive_members as $member)
          <tr>
            <td>{{ $member->name }}</td>
            <td>{{ $member->phone }}</td>
            <td class="text-center">{{ date("d / m / Y", strtotime($member->birth))  }}</td>
            <td class="text-center">{{ date("d / m / Y", strtotime($member->demission))  }}</td>
            <td>{{ $member->congregation->name }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>

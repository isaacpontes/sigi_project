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
    thead {
      background-color: #555555;
      color: #eaeaea;
      font-weight: 600;
    }
    tr {
      border-bottom: solid 1px #555555;
    }
    th, td {
      padding: 6px;
      font-size: 12px;
    }
    .ml-lg {
      margin-left: 96px;
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
    <h4 class="text-center">Lista de Membros Inativos</h4>
    <p class="ml-lg">Total de membros inativos: {{ $inactive_members->count() }}</p>
    <table class="ml-lg">
      <thead class="text-center">
        <tr>
          <th>Nome</th>
          <th>Telefone</th>
          <th>Data de Nascimento</th>
          <th>Congregação</th>
        </tr>
      </thead>
      <tbody>
        @foreach($inactive_members as $member)
          <tr>
            <td>{{ $member->name }}</td>
            <td>{{ $member->phone }}</td>
            <td class="text-center">{{ date("d / m / Y", strtotime($member->birth))  }}</td>
            <td>{{ $member->congregation->name }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>

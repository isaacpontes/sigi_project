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
    .mx-lg {
      margin-left: 96px;
      margin-right: 96px;
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
  <div class="mx-lg">
    <h4 class="text-center">Lista de Congregações</h4>
    <p>Total de congregações: {{ $congregations->count() }}</p>
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Telefone</th>
          <th>Endereço</th>
        </tr>
      </thead>
      <tbody>
        @foreach($congregations as $congregation)
          <tr>
            <td>{{ $congregation->name }}</td>
            <td>{{ $congregation->phone }}</td>
            <td>{{ $congregation->address }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>

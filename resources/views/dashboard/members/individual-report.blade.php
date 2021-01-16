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
      padding: 4px 8px;
      padding-right: 16px;
      font-size: 12px;
      text-align: left;
    }
    td {
      padding-bottom: 16px;
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
    <br>
    <h4 class="text-center">Ficha de Membro - {{ $member->name }}</h4>
    <br>
    <br>
    <br>
    <table class="center">
      <tbody>
        <tr>
          <th>Nome:</th>
          <th>Gênero:</th>
          <th>Data de Nascimento:</th>
          <th>Telefone:</th>
        </tr>
        <tr>
          <td>{{ $member->name }}</td>
          <td>{{ $member->gender == 0 ? __('Male') : __('Female') }}</td>
          <td>{{ date("d / m / Y", strtotime($member->birth))  }}</td>
          <td>{{ $member->phone }}</td>
        </tr>
        <tr>
          <th>Email:</th>
          <th colspan="3">Endereço:</th>
        </tr>
        <tr>
          <td>{{ $member->email }}</td>
          <td colspan="3">{{ $member->address  }}</td>
        </tr>
        <tr>
          <th>Situação do Membro:</th>
          <th>Data de Admissão:</th>
          @isset($member->demission)
            <th>Data de Desligamento:</th>
          @endisset
        </tr>
        <tr>
          <td>{{ $member->isActive() ? __('Active') : __('Inactive') }}</td>
          <td>{{ date('d / m / Y', strtotime($member->admission)) }}</td>
          @isset($member->demission)
            <td>{{ date('d / m / Y', strtotime($member->demission)) }}</td>
          @endisset
        </tr>
        <tr>
          <th>Congregação:</th>
          @isset($member->classroom)
            <th colspan="2">Classe:</th>
          @endisset
        </tr>
        <tr>
          <td>{{ $member->congregation->name }}</td>
          @isset($member->classroom)
            <td colspan="2">{{ $member->classroom->name  }}</td>
          @endisset
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>

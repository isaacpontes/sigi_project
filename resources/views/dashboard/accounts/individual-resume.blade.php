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
    .mt-md {
      margin-top: 32px;
    }
    .ml-md {
      margin-left: 32px;
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
    .inline-block {
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
    <h4 class="text-center">Resumo de Conta - {{ $account->name }}</h4>
    <p class="ml-lg"><strong>Nome:</strong> {{ $account->name }}</p>
    <p class="ml-lg"><strong>Saldo Atual:</strong> R$ {{ number_format($account->balance/100, 2, ',', '.') }}</p>
    <p class="ml-lg"><strong>Informações Adicionais:</strong> {{ $account->add_info }}</p>
    <div class="mt-md ml-lg">
      <div class="inline-block">
        <h4>Entradas do Mês:</h4>
        <table>
          <thead>
            <tr>
              <th>Nome:</th>
              <th>Data:</th>
              <th>Valor:</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($month_incomes as $income)
              <tr>
                <td>{{ $income->name }}</td>
                <td>{{ date("d / m / Y", strtotime($income->ref_date)) }}</td>
                <td>R$ {{ number_format($income->value/100, 2, ',', '.') }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="inline-block">
        <h4>Saídas do Mês:</h4>
        <table>
          <thead>
            <tr>
              <th>Nome:</th>
              <th>Data:</th>
              <th>Valor:</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($month_expenses as $expense)
              <tr>
                <td>{{ $expense->name }}</td>
                <td>{{ date("d / m / Y", strtotime($expense->ref_date)) }}</td>
                <td>R$ {{ number_format($expense->value/100, 2, ',', '.') }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <p><strong>Total de Entradas:</strong> {{ $current_month_incomes }}</p>
      <p><strong>Total de Saídas:</strong> {{ $current_month_expenses }}</p>
      <p><strong>Balanço do Mês:</strong> {{ $current_month_balance }}</p>
    </div>
    <div class="mt-md ml-lg">
      <div>
        <h4>Entradas do Ano:</h4>
        <table>
          <thead>
            <tr>
              <th>Nome:</th>
              <th>Data:</th>
              <th>Valor:</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($year_incomes as $income)
              <tr>
                <td>{{ $income->name }}</td>
                <td>{{ date("d / m / Y", strtotime($income->ref_date)) }}</td>
                <td>R$ {{ number_format($income->value/100, 2, ',', '.') }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div>
        <h4>Saídas do Ano:</h4>
        <table>
          <thead>
            <tr>
              <th>Nome:</th>
              <th>Data:</th>
              <th>Valor:</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($year_expenses as $expense)
              <tr>
                <td>{{ $expense->name }}</td>
                <td>{{ date("d / m / Y", strtotime($expense->ref_date)) }}</td>
                <td>R$ {{ number_format($expense->value/100, 2, ',', '.') }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <p><strong>Total de Entradas:</strong> {{ $current_year_incomes }}</p>
      <p><strong>Total de Saídas:</strong> {{ $current_year_expenses }}</p>
      <p><strong>Balanço do Ano:</strong> {{ $current_year_balance }}</p>
    </div>
  </div>
</body>
</html>

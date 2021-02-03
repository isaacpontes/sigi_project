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
    .mt-sm {
      margin-top: 16px;
    }
    .mt-md {
      margin-top: 32px;
    }
    .mx-md {
      margin-left: 32px;
      margin-right: 32px;
    }
    .mx-lg {
      margin-left: 96px;
      margin-right: 96px;
    }
    .center {
      margin-left: auto;
      margin-right: auto;
    }
    .text-center {
      text-align: center;
    }
    .fixed-width {
      width: 115px;
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
    <h4 class="mt-md text-center">Resumo Financeiro</h4>
    <p class="mt-md">
      <strong>Saldo Atual:</strong> R$ {{ number_format($total_balance, 2, ',', '.') }}
    </p>
    <div>
      <table>
        <thead>
          <tr>
            <th class="fixed-width" colspan="2">Mês Atual ({{ date("m/Y") }})</th>
            <th class="fixed-width" colspan="2">Ano Atual ({{ date("Y") }})</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="fixed-width">Entradas:</td>
            <td class="fixed-width">R$ {{ number_format($current_month_incomes, 2, ',', '.') }}</td>
            <td class="fixed-width">Entradas:</td>
            <td class="fixed-width">R$ {{ number_format($current_year_incomes, 2, ',', '.') }}</td>
          </tr>
          <tr>
            <td class="fixed-width">Saídas:</td>
            <td class="fixed-width">R$ {{ number_format($current_month_expenses, 2, ',', '.') }}</td>
            <td class="fixed-width">Saídas:</td>
            <td class="fixed-width">R$ {{ number_format($current_year_expenses, 2, ',', '.') }}</td>
          </tr>
          <tr>
            <td class="fixed-width">Balanço:</td>
            <td class="fixed-width">R$ {{ number_format($current_month_balance, 2, ',', '.') }}</td>
            <td class="fixed-width">Balanço:</td>
            <td class="fixed-width">R$ {{ number_format($current_year_balance, 2, ',', '.') }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div>
      <table>
        <thead>
          <tr>
            <th class="fixed-width" colspan="2">Mês Anterior ({{ date("m/Y", strtotime("-1 month")) }})</th>
            <th class="fixed-width" colspan="2">Ano Anterior ({{ date("Y", strtotime("-1 year")) }})</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="fixed-width">Entradas:</td>
            <td class="fixed-width">R$ {{ number_format($last_month_incomes, 2, ',', '.') }}</td>
            <td class="fixed-width">Entradas:</td>
            <td class="fixed-width">R$ {{ number_format($last_year_incomes, 2, ',', '.') }}</td>
          </tr>
          <tr>
            <td class="fixed-width">Saídas:</td>
            <td class="fixed-width">R$ {{ number_format($last_month_expenses, 2, ',', '.') }}</td>
            <td class="fixed-width">Saídas:</td>
            <td class="fixed-width">R$ {{ number_format($last_year_expenses, 2, ',', '.') }}</td>
          </tr>
          <tr>
            <td class="fixed-width">Balanço:</td>
            <td class="fixed-width">R$ {{ number_format($last_month_balance, 2, ',', '.') }}</td>
            <td class="fixed-width">Balanço:</td>
            <td class="fixed-width">R$ {{ number_format($last_year_balance, 2, ',', '.') }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div>
      <div class="inline-block">
        <h4>Contas da Igreja:</h4>
        <table>
          <thead>
            <tr>
              <th class="fixed-width">Nome:</th>
              <th class="fixed-width">Saldo:</th>
              <th>Informações Adicionais:</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($accounts as $account)
              <tr>
                <td>{{ $account->name }}</td>
                <td>R$ {{ number_format($account->balance/100, 2, ',', '.') }}</td>
                <td>{{ $account->add_info }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>

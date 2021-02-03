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
    .mb-sm {
      margin-bottom: 16px;
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
    <h3 class="mt-md text-center">
      Relatório Financeiro - Período de {{ $initial_date->format("d/m/Y") . " a " . $final_date->format("d/m/Y") }}
    </h3>
    <p class="mt-md">
      <strong>Total de Entradas:</strong> R$ {{ number_format($total_incomes_value, 2, ',', '.') }}
    </p>
    <p>
      <strong>Total de Saídas:</strong> R$ {{ number_format($total_expenses_value, 2, ',', '.') }}
    </p>
    <p>
      <strong>Balanço do Período:</strong> R$ {{ number_format($total_balance, 2, ',', '.') }}
    </p>
    <div>
      <p>
        <strong>Entradas</strong>
      </p>
      <ul>
      @foreach ($grouped_incomes as $category => $incomes)
        <li class="mb-sm">
          <strong>{{ $category }}:</strong> R$ {{ number_format(intdiv($incomes->sum('value'), 100), 2, ',', '.') }}
        </li>
      @endforeach
      </ul>
      <p>
        <strong>Saídas</strong>
      </p>
      <ul>
      @foreach ($grouped_expenses as $category => $expenses)
        <li class="mb-sm">
          <strong>{{ $category }}:</strong> R$ {{ number_format(intdiv($expenses->sum('value'), 100), 2, ',', '.') }}
        </li>
      @endforeach
      </ul>
    </div>
  </div>
</body>
</html>

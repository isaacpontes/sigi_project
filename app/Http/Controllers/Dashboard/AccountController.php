<?php

namespace App\Http\Controllers\Dashboard;

use App\Account;
use App\Helpers\AccountsHelper;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    private $rules = [
        'name' => 'required|string',
        'balance' => 'required|numeric',
        'add_info' => 'string'
    ];

    private $accounts_helper;

    public function __construct()
    {
        $this->accounts_helper = new AccountsHelper();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = DB::table('accounts')
            ->where('church_id', auth()->user()->church_id)
            ->get(['id', 'name', 'balance']);

        $incomes = DB::table('incomes')
            ->where('church_id', auth()->user()->church_id)
            ->get(['value', 'ref_date']);

        $expenses = DB::table('expenses')
            ->where('church_id', auth()->user()->church_id)
            ->get(['value', 'ref_date']);

        $current_month_incomes = $this->accounts_helper->getCurrentMonthTransactionsTotal($incomes);
        $current_month_expenses = $this->accounts_helper->getCurrentMonthTransactionsTotal($expenses);

        $current_year_incomes = $this->accounts_helper->getCurrentYearTransactionsTotal($incomes);
        $current_year_expenses = $this->accounts_helper->getCurrentYearTransactionsTotal($expenses);

        $last_month_incomes = $this->accounts_helper->getLastMonthTransactionsTotal($incomes);
        $last_month_expenses = $this->accounts_helper->getLastMonthTransactionsTotal($expenses);

        $current_month_balance = $current_month_incomes - $current_month_expenses;
        $current_year_balance = $current_year_incomes - $current_year_expenses;
        $last_month_balance = $last_month_incomes - $last_month_expenses;

        $total_balance = $accounts->sum('balance');
        $total_balance /= 100;

        return view('dashboard.accounts.index')->with([
            'accounts' => $accounts,
            'total_balance' => $total_balance,
            'current_month_incomes' => $current_month_incomes,
            'current_month_expenses' => $current_month_expenses,
            'current_month_balance' => $current_month_balance,
            'current_year_incomes' => $current_year_incomes,
            'current_year_expenses' => $current_year_expenses,
            'current_year_balance' => $current_year_balance,
            'last_month_incomes' => $last_month_incomes,
            'last_month_expenses' => $last_month_expenses,
            'last_month_balance' => $last_month_balance,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate($this->rules);

            $account = new Account();
            $account->name = $request->name;
            $account->balance = intval($request->balance * 100);
            $account->add_info = $request->add_info;
            $account->church_id = auth()->user()->church_id;
            $account->save();

            return redirect()->route('dashboard.finances.accounts.store')->with([
                'status' => 'Conta salva com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao salvar conta.',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        $incomes = DB::table('incomes')
            ->where('church_id', auth()->user()->church_id)
            ->where('account_id', $account->id)
            ->orderBy('ref_date', 'desc')
            ->limit(8)
            ->get();
        $expenses = DB::table('expenses')
            ->where('church_id', auth()->user()->church_id)
            ->where('account_id', $account->id)
            ->orderBy('ref_date', 'desc')
            ->limit(8)
            ->get();

        return view('dashboard.accounts.show')->with([
            'account' => $account,
            'incomes' => $incomes,
            'expenses' => $expenses
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('dashboard.accounts.edit')->with('account', $account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        try {
            $request->validate(['name' => 'required']);
            $account->update([
                'name' => $request->name,
                'add_info' => $request->add_info
            ]);

            return redirect()->route('dashboard.finances.accounts.index')->with([
                'status' => 'Conta atualizada com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao atualizar conta.',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        try {
            $account->delete();

            return redirect()->route('dashboard.finances.accounts.index')->with([
                'status' => 'Conta excluída com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.finances.accounts.index')->with([
                'error' => 'Erro ao excluir conta.',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function individualResume(Account $account)
    {
        $pdf = $this->accounts_helper->createIndividualPdfResume($account);

        return $pdf->download('resumo-conta-' . $account->name . '.pdf');
    }

    public function generalResume()
    {
        $pdf = $this->accounts_helper->createGeneralPdfResume();

        return $pdf->download('relatorio-financeiro-geral.pdf');
    }

    public function customReport(Request $request)
    {
        $initial_date = DateTime::createFromFormat('Y-m-d', $request->query('initial_date'));
        $final_date = DateTime::createFromFormat('Y-m-d', $request->query('final_date'));

        if ($request->query('account_id')) {
            $account_id = $request->query('account_id');

            $pdf = $this->accounts_helper->createIndividualCustomPdfReport($initial_date, $final_date, $account_id);

            $file_name = 'relatorio-financeiro-individual-' . $initial_date->format("d-m-Y") . '-' . $final_date->format("d-m-Y") . '.pdf';
        } else {
            $pdf = $this->accounts_helper->createCustomPdfReport($initial_date, $final_date);

            $file_name = 'relatorio-financeiro-' . $initial_date->format("d-m-Y") . '-' . $final_date->format("d-m-Y") . '.pdf';
        }


        return $pdf->download($file_name);
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Account;
use App\Helpers\FinanceHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = DB::table('accounts')
            ->where('church_id', Auth()->user()->church_id)
            ->get(['id', 'name', 'balance', 'add_info']);

        $incomes = DB::table('incomes')
            ->where('church_id', Auth()->user()->church_id)
            ->get(['value', 'ref_date']);

        $expenses = DB::table('expenses')
            ->where('church_id', Auth()->user()->church_id)
            ->get(['value', 'ref_date']);

        $current_month = date("Y-m");
        $current_year = date("Y");
        $last_month = date("Y-m", strtotime("-1 month"));
        $last_year = date("Y", strtotime("-1 year"));

        $month_incomes = FinanceHelper::filterTransactionsByMonth($incomes, $current_month);
        $current_month_incomes = $month_incomes->sum('value');
        $current_month_incomes /= 100;

        $year_incomes = FinanceHelper::filterTransactionsByYear($incomes, $current_year);
        $current_year_incomes = $year_incomes->sum('value');
        $current_year_incomes /= 100;

        $month_expenses = FinanceHelper::filterTransactionsByMonth($expenses, $current_month);
        $current_month_expenses = $month_expenses->sum('value');
        $current_month_expenses /= 100;

        $year_expenses = FinanceHelper::filterTransactionsByYear($expenses, $current_year);
        $current_year_expenses = $year_expenses->sum('value');
        $current_year_expenses /= 100;

        $month_incomes = FinanceHelper::filterTransactionsByMonth($incomes, $last_month);
        $last_month_incomes = $month_incomes->sum('value');
        $last_month_incomes /= 100;

        $year_incomes = FinanceHelper::filterTransactionsByYear($incomes, $last_year);
        $last_year_incomes = $year_incomes->sum('value');
        $last_year_incomes /= 100;

        $month_expenses = FinanceHelper::filterTransactionsByMonth($expenses, $last_month);
        $last_month_expenses = $month_expenses->sum('value');
        $last_month_expenses /= 100;

        $year_expenses = FinanceHelper::filterTransactionsByYear($expenses, $last_year);
        $last_year_expenses = $year_expenses->sum('value');
        $last_year_expenses /= 100;

        $current_month_balance = $current_month_incomes - $current_month_expenses;
        $current_year_balance = $current_year_incomes - $current_year_expenses;
        $last_month_balance = $last_month_incomes - $last_month_expenses;
        $last_year_balance = $last_year_incomes - $last_year_expenses;

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
            'last_year_incomes' => $last_year_incomes,
            'last_year_expenses' => $last_year_expenses,
            'last_year_balance' => $last_year_balance,
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
        $account = new Account();
        $account->name = $request->name;
        $account->balance = intval($request->balance * 100);
        $account->add_info = $request->add_info;
        $account->church_id = auth()->user()->church_id;

        $account->save();

        return redirect()->route('dashboard.accounts.store');
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
                        ->where('church_id', Auth()->user()->church_id)
                        ->where('account_id', $account->id)
                        ->orderBy('ref_date', 'desc')
                        ->limit(8)
                        ->get();
        $expenses = DB::table('expenses')
                        ->where('church_id', Auth()->user()->church_id)
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
        $account->name = $request->name;
        $account->add_info = $request->add_info;

        $account->save();

        return redirect()->route('dashboard.accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('dashboard.accounts.index');
    }

    public function individualResume(Account $account)
    {
        $pdf = FinanceHelper::createIndividualPdfResume($account);

        return $pdf->download('resumo-conta-' . $account->name . '.pdf');
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Account;
use App\Expense;
use App\Http\Controllers\Controller;
use App\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::where('church_id', Auth()->user()->church_id)->get();
        $incomes = Income::where('church_id', Auth()->user()->church_id)->get();
        $expenses = Expense::where('church_id', Auth()->user()->church_id)->get();

        $month_incomes = $incomes->filter(function ($income) {
            $today = date("Y-m");
            $ref_month = date("Y-m", strtotime($income->ref_date));
            return $ref_month === $today;
        });
        $total_month_incomes = $month_incomes->sum('value');
        $total_month_incomes /= 100;

        $year_incomes = $incomes->filter(function ($income) {
            $today = date("Y");
            $ref_year = date("Y", strtotime($income->ref_date));
            return $ref_year === $today;
        });
        $total_year_incomes = $year_incomes->sum('value');
        $total_year_incomes /= 100;

        $month_expenses = $expenses->filter(function ($expense) {
            $today = date("Y-m");
            $ref_month = date("Y-m", strtotime($expense->ref_date));
            return $ref_month === $today;
        });
        $total_month_expenses = $month_expenses->sum('value');
        $total_month_expenses /= 100;

        $year_expenses = $expenses->filter(function ($expense) {
            $today = date("Y");
            $ref_year = date("Y", strtotime($expense->ref_date));
            return $ref_year === $today;
        });
        $total_year_expenses = $year_expenses->sum('value');
        $total_year_expenses /= 100;

        $total_balance = $accounts->sum('balance');
        $total_balance /= 100;
        return view('dashboard.accounts.index')->with([
            'accounts' => $accounts,
            'total_balance' => $total_balance,
            'total_month_incomes' => $total_month_incomes,
            'total_year_incomes' => $total_year_incomes,
            'total_month_expenses' => $total_month_expenses,
            'total_year_expenses' => $total_year_expenses
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
        $incomes = $account->incomes;
        $expenses = $account->expenses;
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
}

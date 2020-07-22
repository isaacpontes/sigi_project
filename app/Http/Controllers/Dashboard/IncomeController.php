<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Income;
use App\Account;
use App\Member;
use App\IncomeCategory;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::where('church_id', auth()->user()->church_id)->get();
        return view('dashboard.incomes.index')->with('incomes', $incomes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::where('church_id', auth()->user()->church_id)->pluck('name', 'id');
        $members = Member::where('church_id', auth()->user()->church_id)->pluck('name', 'id');
        $income_categories = IncomeCategory::where('church_id', auth()->user()->church_id)->pluck('name', 'id');
        return view('dashboard.incomes.create')->with([
            'accounts' => $accounts,
            'members' => $members,
            'income_categories' => $income_categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $income = new Income();
        $income->name = $request->name;
        $income->value = intval($request->value * 100); // Using integer type for currency on DB;
        $income->ref_date = $request->ref_date;
        $income->add_info = $request->add_info;
        $income->member_id = $request->member_id;
        $income->income_category_id = $request->income_category_id;
        $income->account_id = $request->account_id;
        $income->church_id = auth()->user()->church_id;

        $income->save();
        $income->saveOnAccount();

        return redirect()->route('dashboard.incomes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        return view('dashboard.incomes.show')->with('income', $income);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        $accounts = Account::where('church_id', auth()->user()->church_id)->pluck('name', 'id');
        $members = Member::where('church_id', auth()->user()->church_id)->pluck('name', 'id');
        $income_categories = IncomeCategory::where('church_id', auth()->user()->church_id)->pluck('name', 'id');
        return view('dashboard.incomes.edit')->with([
            'income' => $income,
            'accounts' => $accounts,
            'members' => $members,
            'income_categories' => $income_categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        $income->deleteOnAccount();

        $income->name = $request->name;
        $income->value = intval($request->value * 100); // Using integer type for currency on DB;
        $income->ref_date = $request->ref_date;
        $income->add_info = $request->add_info;
        $income->member_id = $request->member_id;
        $income->income_category_id = $request->income_category_id;
        $income->account_id = $request->account_id;

        $income->save();
        $income->saveOnAccount();

        return redirect()->route('dashboard.incomes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        $income->delete();
        $income->deleteOnAccount();

        return redirect()->route('dashboard.incomes.index');
    }
}

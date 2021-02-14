<?php

namespace App\Http\Controllers\Dashboard;

use App\Expense;
use App\Account;
use App\ExpenseCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = DB::table('expenses')
            ->where('expenses.church_id', Auth::user()->church_id)
            ->leftJoin('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
            ->select([
                'expenses.id',
                'expenses.name',
                'expenses.value',
                'expenses.ref_date',
                'expense_categories.name AS category'
        ])->paginate(10);

        return view('dashboard.expenses.index')->with('expenses', $expenses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::where('church_id', auth()->user()->church_id)->pluck('name', 'id');
        $expense_categories = ExpenseCategory::where('church_id', auth()->user()->church_id)->pluck('name', 'id');
        return view('dashboard.expenses.create')->with([
            'accounts' => $accounts,
            'expense_categories' => $expense_categories
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
        $expense = new Expense();
        $expense->name = $request->name;
        $expense->value = intval($request->value * 100); // Using integer type for currency on DB;
        $expense->ref_date = $request->ref_date;
        $expense->add_info = $request->add_info;
        $expense->expense_category_id = $request->expense_category_id;
        $expense->account_id = $request->account_id;
        $expense->church_id = auth()->user()->church_id;

        $expense->save();
        $expense->saveOnAccount();

        return redirect()->route('dashboard.expenses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        return view('dashboard.expenses.show')->with('expense', $expense);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $accounts = Account::where('church_id', auth()->user()->church_id)->pluck('name', 'id');
        $expense_categories = ExpenseCategory::where('church_id', auth()->user()->church_id)->pluck('name', 'id');
        return view('dashboard.expenses.edit')->with([
            'expense' => $expense,
            'accounts' => $accounts,
            'expense_categories' => $expense_categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $expense->deleteOnAccount();

        $expense->name = $request->name;
        $expense->value = intval($request->value * 100); // Using integer type for currency on DB;
        $expense->ref_date = $request->ref_date;
        $expense->add_info = $request->add_info;
        $expense->expense_category_id = $request->expense_category_id;
        $expense->account_id = $request->account_id;
        $expense->church_id = auth()->user()->church_id;

        $expense->save();
        $expense->saveOnAccount();

        return redirect()->route('dashboard.expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        $expense->deleteOnAccount();

        return redirect()->route('dashboard.expenses.index');
    }
}

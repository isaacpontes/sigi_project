<?php

namespace App\Http\Controllers\Dashboard;

use App\ExpenseCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense_categories = ExpenseCategory::where('church_id', auth()->user()->church_id)->get();
        return view('dashboard.expense-categories.index')->with('expense_categories', $expense_categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expense_category = new ExpenseCategory();
        $expense_category->name = $request->name;
        $expense_category->church_id = auth()->user()->church_id;

        $expense_category->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpenseCategory  $expense_category
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseCategory $expense_category)
    {
        $expenses = DB::table('expenses')
            ->where('church_id', Auth::user()->id)
            ->where('expense_category_id', $expense_category->id)
            ->orderByDesc('ref_date')
            ->paginate(8);
        return view('dashboard.expense-categories.show')->with([
            'expense_category' => $expense_category,
            'expenses' => $expenses
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpenseCategory  $expense_category
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseCategory $expense_category)
    {
        return view('dashboard.expense-categories.edit')->with('expense_category', $expense_category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpenseCategory  $expense_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseCategory $expense_category)
    {
        $expense_category->name = $request->name;

        $expense_category->save();

        return redirect()->route('dashboard.finance-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpenseCategory  $expense_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseCategory $expense_category)
    {
        $expense_category->delete();

        return redirect()->back();
    }
}

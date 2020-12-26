<?php

namespace App\Http\Controllers\Dashboard;

use App\ExpenseCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.expense-categories.create');
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

        return redirect()->route('dashboard.expense_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpenseCategory  $expense_category
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseCategory $expense_category)
    {
        return view('dashboard.expense-categories.show')->with('expense_category', $expense_category);
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

        return redirect()->route('dashboard.expense_categories.index');
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

        return redirect()->route('dashboard.expense_categories.index');
    }
}

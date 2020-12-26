<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\IncomeCategory;
use Illuminate\Http\Request;

class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income_categories = IncomeCategory::where('church_id', auth()->user()->church_id)->get();
        return view('dashboard.income-categories.index')->with('income_categories', $income_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.income-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $income_category = new IncomeCategory();
        $income_category->name = $request->name;
        $income_category->church_id = auth()->user()->church_id;

        $income_category->save();

        return redirect()->route('dashboard.income_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IncomeCategory  $income_category
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeCategory $income_category)
    {
        return view('dashboard.income-categories.show')->with('income_category', $income_category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IncomeCategory  $income_category
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomeCategory $income_category)
    {
        return view('dashboard.income-categories.edit')->with('income_category', $income_category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IncomeCategory  $income_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomeCategory $income_category)
    {
        $income_category->name = $request->name;

        $income_category->save();

        return redirect()->route('dashboard.income_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IncomeCategory  $income_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomeCategory $income_category)
    {
        $income_category->delete();

        return redirect()->route('dashboard.income_categories.index');
    }
}

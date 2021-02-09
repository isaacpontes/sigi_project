<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FinancialCategoryController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $income_categories = IncomeCategory::where('church_id', auth()->user()->church_id)->get();
        $income_categories = DB::table('income_categories')
            ->where('church_id', Auth::user()->id)
            ->simplePaginate();
        $expense_categories = DB::table('expense_categories')
            ->where('church_id', Auth::user()->id)
            ->simplePaginate();
        return view('dashboard.finance-categories.index')->with([
            'income_categories' => $income_categories,
            'expense_categories' => $expense_categories
        ]);
    }
}

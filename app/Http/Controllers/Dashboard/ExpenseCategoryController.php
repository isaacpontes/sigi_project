<?php

namespace App\Http\Controllers\Dashboard;

use App\ExpenseCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpenseCategoryController extends Controller
{
    private $rules = [
        'name' => 'required|string'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense_categories = ExpenseCategory::query()
            ->where('church_id', auth()->user()->church_id)
            ->get();

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
        try {
            $request->validate($this->rules);

            $expense_category = new ExpenseCategory();
            $expense_category->name = $request->name;
            $expense_category->church_id = auth()->user()->church_id;
            $expense_category->save();

            return redirect()->back()->with([
                'status' => 'Categoria de despesas salva com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao salvar categoria de despesas.',
                'message' => $th->getMessage()
            ]);
        }
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
            ->paginate(20);

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
        try {
            $request->validate($this->rules);
            $expense_category->update([
                'name' => $request->name
            ]);

            return redirect()->route('dashboard.finances.categories')->with([
                'status' => 'Categoria de despesas atualizada com sucesso.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao atualizar categoria de despesas.',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpenseCategory  $expense_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseCategory $expense_category)
    {
        try {
            $expense_category->delete();

            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao excluir categoria de despesas.',
                'message' => $th->getMessage()
            ]);
        }
    }
}

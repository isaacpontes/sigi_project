<?php

namespace App\Http\Controllers\Dashboard;

use App\Expense;
use App\Helpers\ExpensesHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    private $rules = [
        'name' => 'required|string',
        'value' => 'required|numeric',
        'ref_date' => 'required|date',
        'expense_category_id' => 'required|string',
        'account_id' => 'required|string'
    ];

    private $expenses_helper;

    public function __construct()
    {
        $this->expenses_helper = new ExpensesHelper();
    }

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
            ])
            ->orderByDesc('ref_date')
            ->paginate(20);

        return view('dashboard.expenses.index')->with('expenses', $expenses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = DB::table('accounts')
            ->where('church_id', auth()->user()->church_id)
            ->pluck('name', 'id');

        $expense_categories = DB::table('expense_categories')
            ->where('church_id', auth()->user()->church_id)
            ->pluck('name', 'id');

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
        try {
            $request->validate($this->rules);
            $this->expenses_helper->saveTransaction($request);

            return redirect()
                ->route('dashboard.finances.expenses.index')
                ->with([
                    'status' => 'Despesa salva com sucesso.'
                ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao salvar despesa',
                'message' => $th->getMessage()
            ]);
        }
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
        $accounts = DB::table('accounts')
            ->where('church_id', auth()->user()->church_id)
            ->pluck('name', 'id');
        $expense_categories = DB::table('expense_categories')
            ->where('church_id', auth()->user()->church_id)
            ->pluck('name', 'id');

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
        try {
            $request->validate($this->rules);
            $this->expenses_helper->updateTransaction($expense, $request);

            return redirect()
                ->route('dashboard.finances.expenses.index')
                ->with([
                    'status' => 'Despesa atualizada com sucesso.'
                ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao atualizar despesa',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        try {
            $this->expenses_helper->deleteTransaction($expense);

            return redirect()
                ->route('dashboard.finances.expenses.index')
                ->with([
                    'status' => 'Despesa excluida com sucesso.'
                ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao excluir despesa',
                'message' => $th->getMessage()
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Income;
use App\Helpers\IncomesHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    private $rules = [
        'name' => 'required|string',
        'value' => 'required|numeric',
        'ref_date' => 'required|date',
        'member_id' => 'string',
        'income_category_id' => 'required|string',
        'account_id' => 'required|string'
    ];

    private $incomes_helper;

    public function __construct()
    {
        $this->incomes_helper = new IncomesHelper();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = DB::table('incomes')
            ->where('incomes.church_id', Auth::user()->church_id)
            ->leftJoin('income_categories', 'incomes.income_category_id', '=', 'income_categories.id')
            ->select([
                'incomes.id',
                'incomes.name',
                'incomes.value',
                'incomes.ref_date',
                'income_categories.name AS category'
            ])
            ->orderByDesc('ref_date')
            ->paginate(20);

        return view('dashboard.incomes.index')->with('incomes', $incomes);
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

        $members = DB::table('members')
            ->where('church_id', auth()->user()->church_id)
            ->pluck('name', 'id');

        $income_categories = DB::table('income_categories')
            ->where('church_id', auth()->user()->church_id)
            ->pluck('name', 'id');

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
        try {
            $request->validate($this->rules);
            $this->incomes_helper->saveTransaction($request);

            return redirect()
                ->route('dashboard.finances.incomes.index')
                ->with([
                    'status' => 'Receita salva com sucesso.'
                ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao salvar receita',
                'message' => $th->getMessage()
            ]);
        }
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
        $accounts = DB::table('accounts')
            ->where('church_id', auth()->user()->church_id)
            ->pluck('name', 'id');

        $members = DB::table('members')
            ->where('church_id', auth()->user()->church_id)
            ->pluck('name', 'id');

        $income_categories = DB::table('income_categories')
            ->where('church_id', auth()->user()->church_id)
            ->pluck('name', 'id');

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
        try {
            $request->validate($this->rules);
            $this->incomes_helper->updateTransaction($income, $request);

            return redirect()
                ->route('dashboard.finances.incomes.index')
                ->with([
                    'status' => 'Receita atualizada com sucesso.'
                ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao atualizar receita',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        try {
            $this->incomes_helper->deleteTransaction($income);

            return redirect()
                ->route('dashboard.finances.incomes.index')
                ->with([
                    'status' => 'Receita excluida com sucesso.'
                ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => 'Erro ao excluir receita',
                'message' => $th->getMessage()
            ]);
        }
    }
}

<?php

namespace App\Helpers;

use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpensesHelper
{
    public function saveTransaction(Request $request): void
    {
        DB::transaction(function () use ($request) {
            $expense = new Expense();
            $expense->name = $request->name;
            $expense->value = intval($request->value * 100);
            $expense->ref_date = $request->ref_date;
            $expense->add_info = $request->add_info;
            $expense->expense_category_id = $request->expense_category_id;
            $expense->account_id = $request->account_id;
            $expense->church_id = auth()->user()->church_id;

            $expense->save();
            $expense->saveOnAccount();
        });
    }

    public function updateTransaction(Expense $expense, Request $request): void
    {
        DB::transaction(function () use ($expense, $request) {
            $expense->deleteOnAccount();

            $expense->name = $request->name;
            $expense->value = intval($request->value * 100);
            $expense->ref_date = $request->ref_date;
            $expense->add_info = $request->add_info;
            $expense->expense_category_id = $request->expense_category_id;
            $expense->account_id = $request->account_id;
            $expense->church_id = auth()->user()->church_id;

            $expense->save();
            $expense->saveOnAccount();
        });
    }

    public function deleteTransaction(Expense $expense): void
    {
        DB::transaction(function () use ($expense) {
            $expense->delete();
            $expense->deleteOnAccount();
        });
    }
}

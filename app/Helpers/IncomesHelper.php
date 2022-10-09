<?php

namespace App\Helpers;

use App\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomesHelper
{
    public function saveTransaction(Request $request)
    {
        DB::transaction(function () use ($request) {
            $income = new Income();
            $income->name = $request->name;
            $income->value = intval($request->value * 100);
            $income->ref_date = $request->ref_date;
            $income->add_info = $request->add_info;
            $income->member_id = $request->member_id === 'null' ? null : $request->member_id;
            $income->income_category_id = $request->income_category_id;
            $income->account_id = $request->account_id;
            $income->church_id = auth()->user()->church_id;

            $income->save();
            $income->saveOnAccount();
        });
    }

    public function updateTransaction(Income $income, Request $request)
    {
        DB::transaction(function () use ($income, $request) {
            $income->deleteOnAccount();

            $income->name = $request->name;
            $income->value = intval($request->value * 100);
            $income->ref_date = $request->ref_date;
            $income->add_info = $request->add_info;
            $income->member_id = $request->member_id;
            $income->income_category_id = $request->income_category_id;
            $income->account_id = $request->account_id;

            $income->save();
            $income->saveOnAccount();
        });
    }

    public function deleteTransaction(Income $income)
    {
        DB::transaction(function () use ($income) {
            $income->delete();
            $income->deleteOnAccount();
        });
    }
}

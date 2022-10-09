<?php

namespace App\Helpers;

use App\Account;
use DateTime;
use Barryvdh\DomPDF\Facade\Pdf as DomPdf;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AccountsHelper
{
    public function getCurrentMonthTransactionsTotal(Collection $transactions): float
    {
        $today = new DateTime();
        $current_month = $today->format("Y-m");

        $current_month_transactions = $this->filterTransactionsByMonth($transactions, $current_month);
        $sum = $current_month_transactions->sum('value');
        $sum /= 100;

        return $sum;
    }

    public function getCurrentYearTransactionsTotal(Collection $transactions): float
    {
        $today = new DateTime();
        $current_year = $today->format("Y");

        $current_year_transactions = $this->filterTransactionsByYear($transactions, $current_year);
        $sum = $current_year_transactions->sum('value');
        $sum /= 100;

        return $sum;
    }

    public function getLastMonthTransactionsTotal(Collection $transactions): float
    {
        $today = new DateTime('-1 month');
        $last_month = $today->format("Y-m");

        $last_month_transactions = $this->filterTransactionsByMonth($transactions, $last_month);
        $sum = $last_month_transactions->sum('value');
        $sum /= 100;

        return $sum;
    }


    public function filterTransactionsByMonth(Collection $transactions, string $month)
    {
        $month_transactions = $transactions->filter(function ($transaction) use ($month) {
            $ref_month = date("Y-m", strtotime($transaction->ref_date));
            return $ref_month === $month;
        });

        return $month_transactions;
    }

    public function filterTransactionsByYear(Collection $transactions, string $year)
    {
        $year_transactions = $transactions->filter(function ($transaction) use ($year) {
            $ref_year = date("Y", strtotime($transaction->ref_date));
            return $ref_year === $year;
        });

        return $year_transactions;
    }

    public function createIndividualPdfResume(Account $account)
    {
        $incomes = $account->incomes;
        $expenses = $account->expenses;

        $current_month = date("Y-m");
        $current_year = date("Y");

        $month_incomes = $this->filterTransactionsByMonth($incomes, $current_month);
        $current_month_incomes = $month_incomes->sum('value');
        $current_month_incomes /= 100;

        $year_incomes = $this->filterTransactionsByYear($incomes, $current_year);
        $current_year_incomes = $year_incomes->sum('value');
        $current_year_incomes /= 100;

        $month_expenses = $this->filterTransactionsByMonth($expenses, $current_month);
        $current_month_expenses = $month_expenses->sum('value');
        $current_month_expenses /= 100;

        $year_expenses = $this->filterTransactionsByYear($expenses, $current_year);
        $current_year_expenses = $year_expenses->sum('value');
        $current_year_expenses /= 100;

        $current_month_balance = $current_month_incomes - $current_month_expenses;
        $current_year_balance = $current_year_incomes - $current_year_expenses;

        $pdf = DomPDF::loadview('dashboard.accounts.individual-resume', compact([
            'account',
            'month_incomes',
            'month_expenses',
            'current_month_incomes',
            'current_month_expenses',
            'current_month_balance',
            'year_incomes',
            'year_expenses',
            'current_year_incomes',
            'current_year_expenses',
            'current_year_balance',
        ]));

        return $pdf;
    }

    public function createGeneralPdfResume()
    {
        $accounts = DB::table('accounts')
            ->where('church_id', Auth()->user()->church_id)
            ->get(['id', 'name', 'balance', 'add_info']);
        $incomes = DB::table('incomes')
            ->where('church_id', Auth()->user()->church_id)
            ->get(['value', 'ref_date']);
        $expenses = DB::table('expenses')
            ->where('church_id', Auth()->user()->church_id)
            ->get(['value', 'ref_date']);

        $current_month = date("Y-m");
        $current_year = date("Y");
        $last_month = date("Y-m", strtotime("-1 month"));
        $last_year = date("Y", strtotime("-1 year"));

        $month_incomes = $this->filterTransactionsByMonth($incomes, $current_month);
        $current_month_incomes = $month_incomes->sum('value');
        $current_month_incomes /= 100;

        $year_incomes = $this->filterTransactionsByYear($incomes, $current_year);
        $current_year_incomes = $year_incomes->sum('value');
        $current_year_incomes /= 100;

        $month_expenses = $this->filterTransactionsByMonth($expenses, $current_month);
        $current_month_expenses = $month_expenses->sum('value');
        $current_month_expenses /= 100;

        $year_expenses = $this->filterTransactionsByYear($expenses, $current_year);
        $current_year_expenses = $year_expenses->sum('value');
        $current_year_expenses /= 100;

        $month_incomes = $this->filterTransactionsByMonth($incomes, $last_month);
        $last_month_incomes = $month_incomes->sum('value');
        $last_month_incomes /= 100;

        $year_incomes = $this->filterTransactionsByYear($incomes, $last_year);
        $last_year_incomes = $year_incomes->sum('value');
        $last_year_incomes /= 100;

        $month_expenses = $this->filterTransactionsByMonth($expenses, $last_month);
        $last_month_expenses = $month_expenses->sum('value');
        $last_month_expenses /= 100;

        $year_expenses = $this->filterTransactionsByYear($expenses, $last_year);
        $last_year_expenses = $year_expenses->sum('value');
        $last_year_expenses /= 100;

        $current_month_balance = $current_month_incomes - $current_month_expenses;
        $current_year_balance = $current_year_incomes - $current_year_expenses;
        $last_month_balance = $last_month_incomes - $last_month_expenses;
        $last_year_balance = $last_year_incomes - $last_year_expenses;

        $total_balance = $accounts->sum('balance');
        $total_balance /= 100;

        $pdf = DomPDF::loadview('dashboard.accounts.general-resume', compact([
            'accounts',
            'total_balance',
            'current_month_incomes',
            'current_month_expenses',
            'current_month_balance',
            'current_year_incomes',
            'current_year_expenses',
            'current_year_balance',
            'last_month_incomes',
            'last_month_expenses',
            'last_month_balance',
            'last_year_incomes',
            'last_year_expenses',
            'last_year_balance',
        ]));

        return $pdf;
    }

    public function createCustomPdfReport(DateTime $initial_date, DateTime $final_date)
    {
        $accounts = DB::table('accounts')
            ->where('church_id', Auth()->user()->church_id)
            ->get(['id', 'name', 'balance', 'add_info']);

        $incomes = DB::table('incomes')
            ->where('incomes.church_id', Auth()->user()->church_id)
            ->whereDate('incomes.ref_date', '>=', $initial_date)
            ->whereDate('incomes.ref_date', '<=', $final_date)
            ->leftJoin('income_categories', 'incomes.income_category_id', '=', 'income_categories.id')
            ->select('incomes.value', 'income_categories.name AS category')
            ->get();

        $expenses = DB::table('expenses')
            ->where('expenses.church_id', Auth()->user()->church_id)
            ->whereDate('expenses.ref_date', '>=', $initial_date)
            ->whereDate('expenses.ref_date', '<=', $final_date)
            ->leftJoin('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
            ->select('expenses.value', 'expense_categories.name AS category')
            ->get();

        $total_incomes_value = $incomes->sum('value');
        $total_incomes_value /= 100;
        $total_expenses_value = $expenses->sum('value');
        $total_expenses_value /= 100;
        $total_balance = $total_incomes_value - $total_expenses_value;

        $grouped_incomes = $incomes->groupBy('category');

        $grouped_expenses = $expenses->groupBy('category');

        $pdf = DomPDF::loadview('dashboard.accounts.custom-report', compact([
            'initial_date',
            'final_date',
            'total_incomes_value',
            'total_expenses_value',
            'total_balance',
            'grouped_incomes',
            'grouped_expenses'
        ]));

        return $pdf;
    }

    public function createIndividualCustomPdfReport(DateTime $initial_date, DateTime $final_date, int $account_id)
    {
        $account = DB::table('accounts')->find($account_id);

        $incomes = DB::table('incomes')
            ->where('incomes.church_id', Auth()->user()->church_id)
            ->where('incomes.account_id', $account_id)
            ->whereDate('incomes.ref_date', '>=', $initial_date)
            ->whereDate('incomes.ref_date', '<=', $final_date)
            ->leftJoin('income_categories', 'incomes.income_category_id', '=', 'income_categories.id')
            ->select('incomes.value', 'income_categories.name AS category')
            ->get();

        $expenses = DB::table('expenses')
            ->where('expenses.church_id', Auth()->user()->church_id)
            ->where('expenses.account_id', $account_id)
            ->whereDate('expenses.ref_date', '>=', $initial_date)
            ->whereDate('expenses.ref_date', '<=', $final_date)
            ->leftJoin('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
            ->select('expenses.value', 'expense_categories.name AS category')
            ->get();

        $total_incomes_value = $incomes->sum('value');
        $total_incomes_value /= 100;
        $total_expenses_value = $expenses->sum('value');
        $total_expenses_value /= 100;
        $total_balance = $total_incomes_value - $total_expenses_value;

        $grouped_incomes = $incomes->groupBy('category');

        $grouped_expenses = $expenses->groupBy('category');

        $pdf = DomPDF::loadview('dashboard.accounts.custom-individual-report', compact([
            'account',
            'initial_date',
            'final_date',
            'total_incomes_value',
            'total_expenses_value',
            'total_balance',
            'grouped_incomes',
            'grouped_expenses'
        ]));

        return $pdf;
    }
}

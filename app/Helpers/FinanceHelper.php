<?php

namespace App\Helpers;

use App\Account;
use DomPDF;
use Illuminate\Support\Collection;

class FinanceHelper
{
    public static function filterTransactionsByMonth(Collection $transactions, string $month)
    {
        $month_transactions = $transactions->filter(function ($transaction) use ($month) {
            $ref_month = date("Y-m", strtotime($transaction->ref_date));
            return $ref_month === $month;
        });

        return $month_transactions;
    }

    public static function filterTransactionsByYear(Collection $transactions, string $year)
    {
        $year_transactions = $transactions->filter(function ($transaction) use ($year) {
            $ref_year = date("Y", strtotime($transaction->ref_date));
            return $ref_year === $year;
        });

        return $year_transactions;
    }

    public static function createIndividualPdfResume(Account $account)
    {
        $incomes = $account->incomes;
        $expenses = $account->expenses;

        $current_month = date("Y-m");
        $current_year = date("Y");

        $month_incomes = self::filterTransactionsByMonth($incomes, $current_month);
        $current_month_incomes = $month_incomes->sum('value');
        $current_month_incomes /= 100;

        $year_incomes = self::filterTransactionsByYear($incomes, $current_year);
        $current_year_incomes = $year_incomes->sum('value');
        $current_year_incomes /= 100;

        $month_expenses = self::filterTransactionsByMonth($expenses, $current_month);
        $current_month_expenses = $month_expenses->sum('value');
        $current_month_expenses /= 100;

        $year_expenses = self::filterTransactionsByYear($expenses, $current_year);
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
}

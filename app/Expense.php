<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //

    public function saveOnAccount()
    {
        $account = Account::find($this->account_id);
        $account->balance -= $this->value;
        $account->save();
    }

    public function deleteOnAccount()
    {
        $account = Account::find($this->account_id);
        $account->balance += $this->value;
        $account->save();
    }

    public function church()
    {
        return $this->belongsTo('App\Church');
    }

    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function expenseCategory()
    {
        return $this->belongsTo('App\ExpenseCategory');
    }
}

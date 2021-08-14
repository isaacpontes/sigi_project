<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    public function saveOnAccount()
    {
        $account = Account::findOrFail($this->account_id);
        $account->balance += $this->value;
        $account->save();
    }

    public function deleteOnAccount()
    {
        $account = Account::findOrFail($this->account_id);
        $account->balance -= $this->value;
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

    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    public function incomeCategory()
    {
        return $this->belongsTo('App\IncomeCategory');
    }
}

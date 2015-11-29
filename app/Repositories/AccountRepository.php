<?php

namespace App\Repositories;

use DB;
use App\Models\Account;
use App\Models\Transaction;

class AccountRepository
{
    public function createAccount($input)
    {
        return Account::create($input);
    }

    public function all()
    {
        return Account::all();
    }

    public function findorfail($id)
    {
        return Account::findorfail($id);
    }

    public function getTransactions($id)
    {
        return Account::find($id)->transaction;
    }

    public function listId()
    {
        return Account::all()->lists('id', 'id');
    }

    public function balance($id)
    {
        return Transaction::join('transaction_codes', 'transaction_codes.id', '=' ,'transaction_code_id')
            ->where('account_id','=', $id)
            ->sum(DB::raw('(amount * multiplier)'));
    }
}
<?php

namespace App\Repositories;

use DB;
use App\Models\Transaction;

class TransactionRepository
{
    public function createTransaction($input)
    {
        $input['user_id'] = \Auth::user()->id;

        return Transaction::create($input);
    }

    public function findorfail($id)
    {
    	return Transaction::findorfail($id);
    }

    public function all()
    {
    	return Transaction::all();
    }

    public function getTransactionPerDay()
    {
        return Transaction::select('date', DB::raw('sum(amount) as amount'))
                            ->groupBy('date')
                            ->get();
    }
}
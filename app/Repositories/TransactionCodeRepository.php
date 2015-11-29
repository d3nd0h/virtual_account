<?php

namespace App\Repositories;

use App\Models\TransactionCode;

class TransactionCodeRepository
{
    public function listId()
    {
        return TransactionCode::all()->lists('transaction_name', 'id');
    }
}
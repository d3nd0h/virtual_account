<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionCode extends Model
{
    protected $fillable = ['transaction_name', 'transaction_code', 'multiplier'];

    public function transaction()
    {
    	return $this->hasMany('App\Models\Transaction');
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['account_id', 'transaction_code_id', 'date', 'amount', 'user_id'];

    public function account()
    {
        return $this->belongsTo('App\Models\Account');
    }

    public function transactionCode()
    {
        return $this->belongsTo('App\Models\TransactionCode');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getAmountAttribute($amount)
    {
        return number_format($amount, 0, ",", ".");
    }

    public function getDateAttribute($date)
    {
        return Carbon::parse($date)->format('l, j M Y');
    }
}

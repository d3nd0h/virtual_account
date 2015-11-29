<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['name', 'birthdate', 'phone', 'address'];

    /**
     * Relationship to transaction
     * 
     * @return collection hasMany Transaction
     */
    public function transaction()
    {
    	return $this->hasMany('App\Models\Transaction');
    }

    public function getIdAttribute($id)
    {
    	return str_pad($id, 3, '0', STR_PAD_LEFT);
    }
}

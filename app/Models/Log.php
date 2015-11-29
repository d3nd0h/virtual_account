<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
	protected $fillable = ['action', 'table', 'accounts', 'user_id'];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}

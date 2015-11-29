<?php

namespace App\Repositories;

use DB;
use App\Models\Log;

class LogRepository
{
    public function create($input)
    {
        return Log::create($input);
    }

    public function all()
    {
        return Log::all();
    }
}
<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function all()
    {
        return User::all();
    }

    public function create($input)
    {
        $input['password'] = bcrypt(env('USER_DEFAULT_PASS','default'));

        return User::create($input);
    }

    public function findorfail($id)
    {
        return User::findorfail($id);
    }

    public function transactions($id)
    {
        return User::findorfail($id)->transaction;
    }
}
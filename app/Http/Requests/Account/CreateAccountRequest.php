<?php

namespace App\Http\Requests\Account;

use App\Http\Requests\Request;

class CreateAccountRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required',
            'birthdate' => 'required|date',
            'address'   => 'required',
            'phone'     => 'required|numeric|digits_between:7,12'
        ];
    }
}

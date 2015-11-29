<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\Request;

class CreateTransactionRequest extends Request
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
            'account_id'              => 'required|exists:accounts,id',
            'transaction_code_id'     => 'required|exists:transaction_codes,id',
            'date'                    => 'required|date',
            'amount'                  => 'required|numeric|min:1'
        ];
    }

    /**
     * Sanitize input before validation.
     *
     * @return array
     */
    public function sanitize()
    {
        $input = $this->all();

        $input['amount'] = str_replace(".", "", $input['amount']);

        $this->replace($input);

        return $this->all();
    }
}

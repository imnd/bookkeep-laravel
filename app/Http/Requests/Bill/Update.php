<?php

namespace App\Http\Requests\Bill;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'client_id'    => 'required|numeric',
            'contract_num' => 'required|numeric',
            'sum'          => 'numeric',
            'remainder'    => 'numeric',
            'date'         => 'date',
            'contents'     => 'string',
        ];
    }
}

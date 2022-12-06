<?php

namespace App\Http\Requests\Contract;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'payed'        => 'numeric',
            'date'         => 'required|date',
            'term_start'   => 'date',
            'term_end'     => 'date',
            'type'         => 'in:contract,agreement',
            'rows'         => 'array',
        ];
    }
}

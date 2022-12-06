<?php

namespace App\Http\Requests\Bill;

use Illuminate\Foundation\Http\FormRequest;

class Search extends FormRequest
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
            'contract_num' => 'numeric',
            'client_id'    => 'numeric|exists:clients,id',
            'dateFrom'     => 'date',
            'dateTo'       => 'date',
        ];
    }
}

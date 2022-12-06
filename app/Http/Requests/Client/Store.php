<?php

namespace App\Http\Requests\Client;

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
            'name'         => 'required|max:255',
            'address'      => 'required|max:255',
            'bank'         => 'required|max:255',
            'region_id'    => 'required|numeric',
            'sort'         => 'numeric',
            'active'       => 'numeric|min:0|max:1',
            'telephone'    => 'numeric|digits:10',
            'fax'          => 'numeric|digits:10',
            'account'      => 'numeric|digits:10',
            'INN'          => 'numeric|digits:10',
            'KPP'          => 'numeric|digits:10',
            'BIK'          => 'numeric|digits:10',
            'contact_fio'  => 'string|max:255',
            'contact_post' => 'string|max:255',
        ];
    }
}

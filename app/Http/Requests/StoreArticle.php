<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticle extends FormRequest
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
            'subcat_id' => 'required|numeric',
            'name'      => 'required|max:255',
            'price'     => 'required|max:255',
            'unit'      => 'required|in:' . implode(',', self::getUnits()),
            'active'    => 'numeric|min:0|max:1',
        ];
    }
}

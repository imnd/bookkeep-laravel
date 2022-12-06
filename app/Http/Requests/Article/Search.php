<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest,
    App\Models\Articles;

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
            'priceFrom' => 'numeric',
            'priceTo'   => 'numeric',
            'name'      => 'max:255',
            'subcat_id' => 'numeric',
            'unit'      => 'in:' . Articles::getUnitsList(),
            'active'    => 'numeric|min:0|max:1',
        ];
    }
}

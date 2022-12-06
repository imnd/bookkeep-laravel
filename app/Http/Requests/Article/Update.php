<?php

namespace App\Http\Requests\Article;

use App\Models\Articles;
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
            'subcat_id' => 'required|numeric',
            'name'      => 'required|max:255',
            'price'     => 'required|numeric',
            'unit'      => 'required|in:' . implode(',', Articles::getUnits()),
            'active'    => 'numeric|min:0|max:1',
        ];
    }
}

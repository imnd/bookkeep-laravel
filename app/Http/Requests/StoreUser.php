<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'name' => 'required|max:255',
            'password' => 'required|password',
            'email' => 'required|email',
            'confirm_code' => 'max:128|min:128',
            'remember_token' => 'max:128|min:128',
            'api_token' => 'max:60|min:60',
        ];
    }
}

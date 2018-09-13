<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertAccountRequest extends FormRequest
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
            //
            'name' => 'bail|required|between:3,20|unique:users',
            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|confirmed|min:6',
            'account_type' => 'required'
        ];
    }
}

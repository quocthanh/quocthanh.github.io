<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
            'userName'              => 'required|min:4|alpha_num|unique:user_infor,name',
            'userPass'              => 'required|min:6|alpha_num|confirmed',
            'userPass_confirmation' => 'required',
            'userEmail'             => 'required|email|unique:user_infor,email'
        ];
    }
}

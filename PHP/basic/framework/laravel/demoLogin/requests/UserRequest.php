<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'userName' => 'required|min:4|alpha_num',
            'userPass' => 'required|min:6|alpha_num'
        ];
    }
    /**
     * errors messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'userName.required' => 'Không được bỏ trống',
            'userName.min' => 'Số ký tự ít nhất là 4',
            'userName.alpha_num' => 'Không được chứa ký tự đặc biệt',
            'userPass.required' => 'Không được bỏ trống',
            'userPass.min' => 'Số ký tự ít nhất là 6',
            'userPass.alpha_num' => 'Không được chứa ký tự đặc biệt'
        ];
    }
}

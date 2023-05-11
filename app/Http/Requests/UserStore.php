<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
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
            'full_name' => 'required',
            // email must be unique in users table
            'email' => 'required|unique:users|email',
            'phone' => 'required|min:9|max:11',
            'username' => 'required|unique:users',
            'password' => 'required',
            // comfirm password must be same with password
            'comfirm-password' => 'required|same:password',
            'role_id' => 'required',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'comfirm-password.required' => 'Vui lòng nhập lại mật khẩu',
            'comfirm-password.same' => 'Mật khẩu không khớp',
            'role_id.required' => 'Vui lòng chọn vai trò',
            'phone.min' => 'Số điện thoại không hợp lệ',
            'phone.max' => 'Số điện thoại không hợp lệ',
        ];
    }
}

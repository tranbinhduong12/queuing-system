<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdate extends FormRequest
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
            // name, description là bắt buộc
            'name' => 'required',
            'description' => 'required',
            'name' => 'max:50',
            'action' => 'required'
        ];
    }
    // Thông báo lỗi
    public function messages()
    {
        return [
            'name.required' => 'Tên vai trò không được để trống',
            'description.required' => 'Mô tả không được để trống',
            'name.max' => 'Tên vai trò không được quá 50 ký tự',
            'action.required' => 'Vui lòng chọn ít nhất một quyền'
        ];
    }
}

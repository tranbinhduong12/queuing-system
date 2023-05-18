<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceStore extends FormRequest
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
            'id_device' => 'required|unique:devices',
            'name' => 'required',
            'username' => 'required',
            'ip' => 'required',
            'password' => 'required',
            'service_ids' => 'required',
            'type' => 'required',
        ];
    }
    // config message

    public function messages()
    {
        return [
            'id_device.required' => 'Mã thiết bị không được để trống',
            'id_device.unique' => 'Mã thiết bị đã tồn tại',
            'name.required' => 'Tên thiết bị không được để trống',
            'username.required' => 'Tên đăng nhập không được để trống',
            'ip.required' => 'Địa chỉ IP không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'service_ids.required' => 'Dịch vụ không được để trống',
            'type.required' => 'Loại thiết bị không được để trống',
        ];
    }
}

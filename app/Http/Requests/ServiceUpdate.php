<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdate extends FormRequest
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
            // id bắt buộc phải có, là duy nhất, không được trùng
            'id_service' => 'required',
            'name' => 'required',
        ];
    }
    // Thông báo lỗi

    public function messages()
    {
        return [
            'id_service.required' => 'Mã dịch vụ không được để trống',
            'name.required' => 'Tên dịch vụ không được để trống',
        ];
    }
}

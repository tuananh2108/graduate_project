<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'phone_number' => ['nullable', 'regex:/(03|08|09)\s?/', 'digits:10'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Họ tên nhân viên không được để trống!',
            'email.required'=>'Email không được để trống!',
            'email.unique'=>'Email đã tồn tại!',
            'password.required'=>'Mật khẩu không được để trống!',
            'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự!',
            'phone_number.regex'=>'Số điện thoại bắt đầu bằng 03, 08 hoặc 09.',
            'phone_number.digits'=>'Số điện thoại phải có 10 số!',
        ];
    }
}

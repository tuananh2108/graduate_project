<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditAccountRequest extends FormRequest
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
            'email' => 'unique:users,email,'.$this->id.',id',
            'password' => 'min:6',
            'password_confirmation' => 'same:password|min:6',
            'phone_number' => ['nullable', 'regex:/(03|08|09)\s?/', 'digits:10'],
        ];
    }

    public function messages()
    {
        return [
            'email.unique'=>'Email đã tồn tại!',
            'password.confirmed'=>'Mật khẩu xác thực không chính xác.',
            'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự!',
            'password_confirmation.same'=>'Mật khẩu xác nhận không trùng khớp!',
            'password_confirmation.min'=>'Mật khẩu phải có ít nhất 6 kí tự!',
            'phone_number.regex'=>'Số điện thoại bắt đầu bằng 03, 08 hoặc 09.',
            'phone_number.digits'=>'Số điện thoại phải có 10 số!',
        ];
    }
}

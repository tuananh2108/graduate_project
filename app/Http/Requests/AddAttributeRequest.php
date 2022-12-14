<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAttributeRequest extends FormRequest
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
            'attribute_name'=>'required|unique:attributes,name'
        ];
    }
    public function messages()
    {
        return [
            'attribute_name.required'=>'Tên thuộc tính không được để trống! ',
            'attribute_name.unique'=>'Tên thuộc tính đã tồn tại',
        ];
    }
}

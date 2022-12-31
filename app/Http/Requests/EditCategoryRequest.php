<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
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
            'name'=>'required|max:20|unique:categories,name,'.$this->id.',id',
        ];
    }

    public function messages()
    {
        return [
            'name.unique'=>'Tên danh mục đã tồn tại',
            'name.required'=>'Tên danh mục không được để trống!',
            'name.max'=>'Tên danh mục không được lớn hơn 20 ký tự',
        ];
    }
}

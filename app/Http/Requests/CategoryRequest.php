<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Please, enter category name',
            'category_name.max' => 'Category name length must be less then 255 symbols',
        ];
    }
}

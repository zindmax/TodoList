<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'add_item' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'add_item.required' => 'Please, enter todo',
            'add_item.max' => 'Todo cannot be longer than 255 characters'
        ];
    }
}

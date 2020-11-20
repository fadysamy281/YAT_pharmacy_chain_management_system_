<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            'name'=>'required|string|min:3|max:35|unique:categories'
        ];
    }
    public function messages(){
        return[
            'name.required'=>'name is required.',
            'name.string'=>'name should be valid string.',
            'name.min'=>'name can not be less than 3 characters',
            'name.max'=>'name can not be more than 35 characters',
            'name.unique'=>'this category exists',

        ];
    }
}

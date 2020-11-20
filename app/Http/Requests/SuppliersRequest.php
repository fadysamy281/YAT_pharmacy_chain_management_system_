<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuppliersRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name'=>'required|string|min:3|max:35',  
            'phone'=>'required|string|min:11|max:11|unique:suppliers',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rest_amount_of_money'=>'required|double',
        ];
    }
    public function messages(){
        return[
            'name.required'=>'name is required.',
            'name.string'=>'name should be valid string.',
            'name.min'=>'name can not be less than 3 characters',
            'name.max'=>'name can not be more than 35 characters',
            'phone.required'=>'phone is required.',
            'phone.string'=>'phone should be valid string.',
            'phone.min'=>'phone must contain of 11 digits',
            'phone.max'=>'phone must contain of 11 digits', 
            'phone.unique'=>'this supplier exists',
                       
            'image.image'=>'provide valid image.',
            'image.mimes'=>'provide valid image.',
            'image.max'=>'provide smaller image.',

            'rest_amount_of_money.required'=>"provide supplier's rest amount of money",
            'rest_amount_of_money.double'=>"provide valid number",

        ];
    }    
}

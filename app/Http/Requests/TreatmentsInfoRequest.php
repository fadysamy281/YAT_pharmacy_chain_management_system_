<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreatmentsInfoRequest extends FormRequest
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
            'name'=>'required|string|min:3|max:35|unique:treatment_info',  
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description'=>'nullable|text',
            'parcode'=>'required|string|min:3|max:50|unique:treatment_info',  
            'price'=>'required|double|min:0',
            'type_id'=>'required|integer|exists:types,id',
            'company_id'=>'required|integer|exists:producing_companies,id',
            'category_id'=>'required|integer|exists:categories,id',
        ];
    }
    public function messages(){
        return[
            'name.required'=>'name is required.',
            'name.string'=>'name should be valid string.',
            'name.min'=>'name can not be less than 3 characters',
            'name.max'=>'name can not be more than 35 characters',
            'name.unique'=>'this treatment exists',

            'image.image'=>'provide valid image.',
            'image.mimes'=>'provide valid image.',
            'image.max'=>'provide smaller image.', 

            'parcode.required'=>'parcode is required.',
            'parcode.string'=>'parcode should be valid string.',
            'parcode.min'=>'parcode can not be less than 3 characters',
            'parcode.max'=>'parcode can not be more than 35 characters',
            'parcode.unique'=>'this parcode existed.',

            'description.text'=>"provide valid description",

            'price.required'=>'price is required.',
            'price.double'=>'price should be valid number.',
            'price.min'=>'never write negative numbers.',

            'type_id.required'=>'provide valid type.',
            'type_id.integer'=>'provide valid type',
            'type_id.exists'=>'provide existed type',

            'company_id.required'=>'provide valid type.',
            'company_id.integer'=>'provide valid type',
            'company_id.exists'=>'provide existed type',

            'category_id.required'=>'provide valid type.',
            'category_id.integer'=>'provide valid type',
            'category_id.exists'=>'provide existed type', 
            ];
    }   
}

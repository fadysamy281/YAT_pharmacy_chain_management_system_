<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniesRequest extends FormRequest
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
            'title'=>'required|string|min:3|max:40|unique:producing_companies',  
            'description'=>'nullable|text',
        ];
    }
    public function messages(){
        return[
            'title.required'=>'title is required.',
            'title.string'=>'title should be valid string.',
            'title.min'=>'title can not be less than 3 characters',
            'title.max'=>'title can not be more than 40 characters',
            'title.unique'=>'Hmmm...this company exists.',

            'description.text'=>"provide valid description",

        ];
    }   
}

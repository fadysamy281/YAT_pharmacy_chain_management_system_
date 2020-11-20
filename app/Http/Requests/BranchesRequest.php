<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchesRequest extends FormRequest
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
            'title'=>'required|string|min:3|max:35|unique:pharmacy_branches',  
            'place'=>'required|string|min:5|max:11',
            'description'=>'nullable|text',
        ];
    }
    public function messages(){
        return[
            'title.required'=>'title is required.',
            'title.string'=>'title should be valid string.',
            'title.min'=>'title can not be less than 3 characters',
            'title.max'=>'title can not be more than 35 characters',
            'title.unique'=>"this pharmacy's branch exists",


            'place.required'=>'place is required.',
            'place.string'=>'place should be valid string.',
            'place.min'=>'place must contain of 5 characters',
            'place.max'=>'place must contain of 11 characters',            

            'description.text'=>"provide valid description",

        ];
    }    
}

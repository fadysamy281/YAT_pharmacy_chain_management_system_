<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypesRequest extends FormRequest
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
            'name'=>'required|string|in(h_types())|unique:types'            
        ];
    }
    public function messages(){
        return[
            'name.required'=>'name is required.',
            'name.in'=>'Hmmm...you should add valid type for your treatment info.',
            'name.string'=>'Hmmm...you should add valid type for your treatment info.',
            'name.unique'=>'Hmmm...this name exists.',

        ];
    }    
}

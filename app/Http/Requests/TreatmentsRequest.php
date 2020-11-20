<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreatmentsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'production_date'=>'required|date|before_or_equal:now', 
            'expiration_date'=>'required|date|after:now', 
            'quantity'=>'required|integer|min:0',
            'treatment_id'=>'required|integer|exists:treatments,id',
            'supplier_id'=>'required|integer|exists:suppliers,id',
            'store_id'=>'nullable|integer|exists:stores,id',
            'branch_id'=>'nullable|integer|exists:pharmacy_branches,id',
        ];
    }
    public function messages(){
        return[
                  
           
            'quantity.required'=>'price is required.',
            'quantity.integer'=>'price should be valid number.',
            'quantity.min'=>'never write negative numbers.',

            'treatment_id.required'=>'provide valid treatment.',
            'treatment_id.integer'=>'provide valid treatment',
            'treatment_id.exists'=>'provide existed treatment',

            'production_date.required'=>'Hmmm...you should provide production_date ',
            'production_date.date'=>'Hmmm...you should provide valid date',
            'production_date.before_or_equal'=>'Hmmm...you should provide valid production_date ',

            'expiration_date.required'=>'Hmmm...you should provide expiration_date ',
            'expiration_date.date'=>'Hmmm...you should provide valid date',
            'expiration_date.after'=>'Hmmm...you should provide valid expiration_date ',

            'supplier_id.required'=>'provide valid supplier.',
            'supplier_id.integer'=>'provide valid supplier',
            'supplier_id.exists'=>'provide existed supplier',

            'store_id.integer'=>'provide valid store',
            'store_id.exists'=>'provide existed store', 

            'branch_id.integer'=>"provide valid pharmacy's branch.",
            'branch_id.exists'=>"provide existed pharmacy's branch.",
            ];
    }   
}

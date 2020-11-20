<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatment;
use App\Http\Requests\TreatmentsRequest;
use Carbon\Carbon;

class TreatmentsController extends Controller
{
   public function index(){
	
	   	$treatments=Treatment::with('supplier'=>function($q){
        $q->select('name','rest_amount_of_money');
      })->paginate(PAGINATION_COUNT);
	   	return view('treatments.index',compact('treatments'));
   }
   
   public function create(){
   		return view('treatments.create');
   }
    public function store(TreatmentsRequest $request){
    	Treatment::create([
     		'quantity'=>$request->quantity,
       		'production_date'=>$request->production_date,
       		'expiration_date'=>$request->expiration_date,
       		'treatment_id'=>$request->treatment_id,
       		'supplier_id'=>$request->supplier_id,
       		'store_id'=>$request->store_id,
       		'branch_id'=>$request->branch_id,
       		'created_at'=>Carbon::now(),
       		'updated_at'=>Carbon::now(),
		]);

   	return redirect()->route('treatments.index')
   	->with(['success'=>' treatment data added successfully']);
   }   

   public function edit(Treatment $treatment){

   	    return view('treatments.edit',compact('treatment'));
   }   
   public function update(TreatmentsRequest $request,Treatment $treatment){
   		 $treatment->update([
     		'quantity'=>$request->quantity,
       		'production_date'=>$request->production_date,
       		'expiration_date'=>$request->expiration_date,
       		'treatment_id'=>$request->treatment_id,
       		'supplier_id'=>$request->supplier_id,
       		'store_id'=>$request->store_id,
       		'branch_id'=>$request->branch_id,
       		'updated_at'=>Carbon::now(),       		       		
   		]);
	   	return redirect()->route('treatments.index')
	   	->with(['success'=>' treatment data updated successfully']);   		 
   }
   public function show(Treatment $treatment){
    
    $treatment=$treatment->with('supplier'=>function($q){
        $q->select('name','rest_amount_of_money');
      })->get(); 
   	    return view('treatments.show',compact('treatment'));
   }    
     public function destroy(Treatment $treatment){
     	$treatment->delete();
	   	return redirect()->route('treatments.index')
	   	->with(['success'=>' treatment date deleted successfully']);
   }    
}

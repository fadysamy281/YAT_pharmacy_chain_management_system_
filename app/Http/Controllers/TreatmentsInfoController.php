<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TreatmentInfo;
use App\Http\Requests\TreatmentsInfoRequest;
//Add ImagesTrait
use Carbon\Carbon;

class TreatmentsInfoController extends Controller
{
   public function index(){
	
	   	$treatments_info=TreatmentInfo::with('categories'=>function($q){
        $q->select('name');
      })->paginate(PAGINATION_COUNT);
	   	return view('treatments_info.index',compact('treatments_info'));
   }
   
   public function create(){
   		return view('treatments_info.create');
   }
    public function store(TreatmentsInfoRequest $request){
    	TreatmentInfo::create([
     		'name'=>$request->name,
       		'image'=>$request->image,
       		'description'=>$request->description,
       		'parcode'=>$request->parcode,
       		'price'=>$request->price,
       		'type_id'=>$request->type_id,
       		'company_id'=>$request->company_id,
       		'category_id'=>$request->category_id,
       		'created_at'=>Carbon::now(),
       		'updated_at'=>Carbon::now(),       		
		]);

   	return redirect()->route('treatments_info.index')
   	->with(['success'=>' treatment_info added successfully']);
   }   

   public function edit(TreatmentInfo $treatment_info){
        $treatment_info=$treatment_info->with('categories'=>function($q){
          $q->select('name');
        })->get();
   	    return view('treatments_info.edit',compact('treatment_info'));
   }   
   public function update(TreatmentsInfoRequest $request,TreatmentInfo $treatment_info){
   		 $treatment_info->update([
     		'name'=>$request->name,
       		'image'=>$request->image,
       		'description'=>$request->description,
       		'parcode'=>$request->parcode,
       		'price'=>$request->price,
       		'type_id'=>$request->type_id,
       		'company_id'=>$request->company_id,
       		'category_id'=>$request->category_id,
       		'updated_at'=>Carbon::now(),       		       		
   		]);
	   	return redirect()->route('treatments_info.index')
	   	->with(['success'=>' treatment_info updated successfully']);   		 
   }
   public function show(TreatmentInfo $treatment_info){
        $treatment_info=$treatment_info->with('categories'=>function($q){
           $q->select('name');
        })->get();
   	    return view('treatments_info.show',compact('treatment_info'));
   }    
     public function destroy(TreatmentInfo $treatment_info){
     	$treatment_info->delete();
	   	return redirect()->route('treatments_info.index')
	   	->with(['success'=>' treatment_info  deleted successfully']);
   }    
}

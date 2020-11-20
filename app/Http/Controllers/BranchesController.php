<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacy_Branch;
use App\Http\Requests\BranchesRequest;
use Carbon\Carbon;

class BranchesController extends Controller
{
   public function index(){
	
	   	$branches=Pharmacy_Branch::paginate(PAGINATION_COUNT);
	   	return view('branches.index',compact('branches'));
   }
   
   public function create(){
   		return view('branches.create');
   }
    public function store(BranchesRequest $request){
    	Pharmacy_Branch::create([
    		  'title'=>$request->title,
       		'place'=>$request->place,
       		'description'=>$request->description,
          'created_at'=>Carbon::now(),
          'updated_at'=>Carbon::now(),
		]);

   	return redirect()->route('branches.index')
   	->with(['success'=>' pharmacy branch added successfully']);
   }   

   public function edit(Pharmacy_Branch $branch){

   	    return view('branches.edit',compact('branch'));
   }   
   public function update(BranchesRequest $request,Pharmacy_Branch $branch){
   		 $branch->update([
   		 	'title'=>$request->title,
   			'place'=>$request->place,
       	'description'=>$request->description,
        'updated_at'=>Carbon::now(),          

   		]);
	   	return redirect()->route('branches.index')
	   	->with(['success'=>'pharmacy branch updated successfully']);   		 
   }
   public function show(Pharmacy_Branch $branch){

   	    return view('branches.show',compact('branch'));
   }    
     public function destroy(Pharmacy_Branch $branch){
     	$branch->delete();
	   	return redirect()->route('branches.index')
	   	->with(['success'=>'pharmacy branch data deleted successfully']);
   } 
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producing_Company;
use App\Http\Requests\CompaniesRequest;
use Carbon\Carbon;

class ProducingCompanyController extends Controller
{
   public function index(){
	
	   	$companies=Producing_Company::paginate(PAGINATION_COUNT);
	   	return view('companies.index',compact('companies'));
   }
   
   public function create(){
   		return view('companies.create');
   }
    public function store(CompaniesRequest $request){
    	Producing_Company::create([
    		'name'=>$request->name,
       	'description'=>$request->description,
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),          
]);

   	return redirect()->route('companies.index')
   	->with(['success'=>'producing company added successfully']);
   }   

   public function edit(Producing_Company $company){

   	    return view('companies.edit',compact('company'));
   }   
   public function update(CompaniesRequest $request,Producing_Company $company){
   		 $company->update([
   		 	'name'=>$request->name,
   			'description'=>$request->description,
        'updated_at'=>Carbon::now(),          
   		]);
	   	return redirect()->route('companies.index')
	   	->with(['success'=>'producing company updated successfully']);   		 
   }
   public function show(Producing_Company $company){

   	    return view('companies.show',compact('company'));
   }    
     public function destroy(Producing_Company $company){
     	$company->delete();
	   	return redirect()->route('companies.index')
	   	->with(['success'=>'producing company deleted successfully']);
   } 
    
}

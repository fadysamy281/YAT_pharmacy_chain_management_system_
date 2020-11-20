<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Http\Requests\StoresRequest;
use Carbon\Carbon;

class StoresController extends Controller
{
   public function index(){
	
	   	$stores=Store::paginate(PAGINATION_COUNT);
	   	return view('stores.index',compact('stores'));
   }
   
   public function create(){
   		return view('stores.create');
   }
    public function store(StoresRequest $request){
    	Store::create([
    		'title'=>$request->title,
       	'place'=>$request->place,
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),        
		]);

   	return redirect()->route('stores.index')
   	->with(['success'=>' store added successfully']);
   }   

   public function edit(Store $store){

   	    return view('stores.edit',compact('store'));
   }   
   public function update(StoresRequest $request,Store $store){
   		 $store->update([
   		 	'title'=>$request->title,
   			'place'=>$request->place,
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),        
   		]);
	   	return redirect()->route('stores.index')
	   	->with(['success'=>' store updated successfully']);   		 
   }
   public function show(Store $store){

   	    return view('stores.show',compact('store'));
   }    
     public function destroy(Store $store){
     	$store->delete();
	   	return redirect()->route('stores.index')
	   	->with(['success'=>' store deleted successfully']);
   } 
}
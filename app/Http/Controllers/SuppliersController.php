<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Requests\SuppliersRequest;
use Carbon\Carbon;

class SuppliersController extends Controller
{
   public function index(){
	
	   	$suppliers=Supplier::with('treatments'=>function($q){
        $q->select('id','name','image','parcode','price');
      })->paginate(PAGINATION_COUNT);
	   	return view('suppliers.index',compact('suppliers'));
   }
   
   public function create(){
   		return view('suppliers.create');
   }
    public function store(SuppliersRequest $request){
    	Supplier::create([
    		'name'=>$request->name,
       		'place'=>$request->place,
       		'phone'=>$request->phone,
       		'rest_amount_of_money'=>$request->rest_amount_of_money,
       		'created_at'=>Carbon::now(),
       		'updated_at'=>Carbon::now(),       		
		]);

   	return redirect()->route('suppliers.index')
   	->with(['success'=>' supplier added successfully']);
   }   

   public function edit(Supplier $supplier){
        $supplier=$supplier->with('treatments'=>function($q){
        $q->select('id','name','image','parcode','price');
      })->get();
   	    return view('suppliers.edit',compact('supplier'));
   }   
   public function update(SuppliersRequest $request,Supplier $supplier){
   		 $supplier->update([
     		'name'=>$request->name,
       		'place'=>$request->place,
       		'phone'=>$request->phone,
       		'rest_amount_of_money'=>$request->rest_amount_of_money,
       		'updated_at'=>Carbon::now(),       		       		
   		]);
	   	return redirect()->route('suppliers.index')
	   	->with(['success'=>' supplier updated successfully']);   		 
   }
   public function show(Supplier $supplier){
        $supplier=$supplier->with('treatments'=>function($q){
        $q->select('id','name','image','parcode','price');
      })->get();
   	    return view('suppliers.show',compact('supplier'));
   }    
     public function destroy(Supplier $supplier){
     	$supplier->delete();
	   	return redirect()->route('suppliers.index')
	   	->with(['success'=>' supplier data deleted successfully']);
   }    
}

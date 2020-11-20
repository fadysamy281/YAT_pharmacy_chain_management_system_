<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoriesRequest;
use Carbon\Carbon;

class CategoriesController extends Controller
{
   public function index(){
	
	   	$categories=Category::with('treatments'=>function($q){
        $q->select('id','name','image','price');
      })->paginate(PAGINATION_COUNT);
	   	return view('categories.index',compact('categories'));
   }
   
   public function create(){
   		return view('categories.create');
   }
    public function store(CategoriesRequest $request){
    	Category::create([
        'name'=>$request->name
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),
     ]);

   	return redirect()->route('categories.index')
   	->with(['success'=>'category added successfully']);
   }   

   public function edit(Category $category){
        $category=$category->with('treatments'=>function($q){
        $q->select('id','name','image','price');
      })->get();
   	    return view('categories.edit',compact('category'));
   }   
   public function update(CategoriesRequest $request,Category $category){
   		$category->update([
        'name'=>$request->name,
        'updated_at'=>Carbon::now(),
      ]);
	   	return redirect()->route('categories.index')
	   	->with(['success'=>'category updated successfully']);   		 
   }
   public function show(Category $category){
        $category=$category->with('treatments'=>function($q){
        $q->select('id','name','image','price');
        })->get();
   	    return view('categories.show',compact('category'));
   }    
     public function destroy(Category $category){
     	$category->delete();
	   	return redirect()->route('categories.index')
	   	->with(['success'=>'category deleted successfully']);
   } 

}

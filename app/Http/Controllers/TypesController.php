<?phpTypesRequest

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Http\Requests\TypesRequest;
use Carbon\Carbon;

class TypesController extends Controller
{
   public function index(){
	
	   	$types=Type::paginate(PAGINATION_COUNT);
	   	return view('types.index',compact('types'));
   }
   
   public function create(){
   		return view('types.create');
   }
    public function store(TypesRequest $request){
    	Type::create([
    		'name'=>$request->name,
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),         
		]);

   	return redirect()->route('types.index')
   	->with(['success'=>'treatment_type added successfully']);
   }   

   public function edit(Type $type){

   	    return view('types.edit',compact('type'));
   }   
   public function update(TypesRequest $request,Type $type){
   		 $type->update([
     		'name'=>$request->name,
        'updated_at'=>Carbon::now(),         
   		]);
	   	return redirect()->route('types.index')
	   	->with(['success'=>'treatment_type updated successfully']);   		 
   }
   public function show(Type $type){

   	    return view('types.show',compact('type'));
   }    
     public function destroy(Type $type){
     	$type->delete();
	   	return redirect()->route('types.index')
	   	->with(['success'=>'treatment_type  deleted successfully']);
   }
}

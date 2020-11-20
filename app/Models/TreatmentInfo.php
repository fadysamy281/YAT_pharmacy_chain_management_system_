<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Producing_Company;
use App\Models\Treatment;
use App\Models\Category;

class TreatmentInfo extends Model
{
    use HasFactory;
    protected $table="treatment_info";
    protected $fillable=['name','image','description',
    		'parcode','price','type_id','company_id','category_id'];

    public function type(){
    	return $this->belongsTo(Type::class,'type_id','id');
    }
    public function company(){
    	return $this->belongsTo(Producing_Company::class,
    		'company_id','id');
    }
    public function categories(){
    	return $this->belongsToMany(Category::class,'treatments_info_categories',
            'treatment_info_id','category_id','id','id');
    }    
    public function treatments(){
    	return $this->hasMany(Treatment::class,
    		'treatment_id','id');
    }        
}

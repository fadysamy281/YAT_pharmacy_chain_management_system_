<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TreatmentInfo;
use App\Models\Supplier;
use App\Models\Store;
use App\Models\Pharmacy_Branch;

class Treatment extends Model
{
    use HasFactory;
    protected $table="treatments";
    protected $fillable=['treatment_id','supplier_id','store_id',
    'branch_id','quantity','production_date','expiration_date'];

    public function supplier(){
    	return $this->belongsTo(Supplier::class,'supplier_id','id');
    } 
    public function store(){
    	return $this->belongsTo(Store::class,'store_id','id');
    }     
    public function branch(){
    	return $this->belongsTo(Pharmacy_Branch::class,'branch_id','id');
    } 
    public function treatmentInfo(){
    	return $this->belongsTo(TreatmentInfo::class,'treatment_id','id');
    }         
}

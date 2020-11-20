<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TreatmentInfo;

class Producing_Company extends Model
{
    use HasFactory;
    protected $table="producing_companies";
    protected $fillable=['name','description'];

    public function treatments(){
    	return $this->hasMany(TreatmentInfo::class,'company_id','id');
    }      
}

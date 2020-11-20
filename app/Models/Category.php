<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TreatmentInfo;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $fillable=['name'];

    public function treatments(){
    	return $this->hasMany(TreatmentInfo::class,
    		'treatments_info_categories','category_id','treatment_info_id','id','id');
    }     
}

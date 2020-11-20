<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TreatmentInfo;

class Type extends Model
{
    use HasFactory;
    protected $table="types";
    protected $fillable=['name'];

    public function treatments(){
    	return $this->hasMany(TreatmentInfo::class,'type_id','id');
    }      
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Treatment;

class Pharmacy_Branch extends Model
{
    use HasFactory;
    protected $table="pharmacy_branches";
    protected $fillable=['title','place','description'];

    public function treatments(){
    	return $this->hasMany(Treatment::class,'branch_id','id');
    }    
}

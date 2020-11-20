<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Treatment;

class Store extends Model
{
    use HasFactory;
    protected $table="stores";
    protected $fillable=['title','place'];

    public function treatments(){
    	return $this->hasMany(Treatment::class,'store_id','id');
    }

}

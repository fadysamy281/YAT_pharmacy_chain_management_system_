<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Treatment;

class Supplier extends Model
{
    use HasFactory;
    protected $table="suppliers";
    protected $fillable=['name','phone','place','rest_amount_of_money'];

    public function treatments(){
    	return $this->hasMany(Treatment::class,'supplier_id','id');
    }          
}

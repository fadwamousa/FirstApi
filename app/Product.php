<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $fillable = ['name','detail','price','stock','discount','user_id'];

    public function reviews(){

    	return $this->hasMany(Review::class,'product_id','id');
    	
    }
}

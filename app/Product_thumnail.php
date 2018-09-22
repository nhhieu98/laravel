<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_thumnail extends Model
{
	protected $fillable = ['url', 'color', 'product_id'];

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}

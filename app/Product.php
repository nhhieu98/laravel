<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['code', 'name', 'screen', 'cpu', 'os', 'type', 'ram', 'description', 'content', 'slug'];

    public static function store($data) {
    	$product = Product::create($data);

    	return $product;
    }
    
    public function thumnail(){
    	return $this->hasMany('App\Product_thumnail');
    }

    public function value(){
    	return $this->hasMany('App\Value');
    }

    public function productvalue(){
        return $this->hasMany('App\ProductValue');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductValue extends Model
{
    protected $fillable = ['product_id', 'rom', 'color', 'price', 'quantity'];

    public static function store($data){
    	return ProductValue::create($data);
    }

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $fillable = ['value', 'product_id', 'attribute_id'];
    
    public function attribute(){
    	return $this->belongsTo('App\Attribute','attribute_id','id');
    }
    public function product(){
    	return $this->belongsTo('App\Product','product_id','id');
    }
}

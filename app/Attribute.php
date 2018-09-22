<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['column'];
    public function value(){
    	return $this->hasMany('App\Value','attribute_id','id');
    }
}

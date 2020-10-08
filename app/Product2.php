<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product2 extends Model
{
    public function attributes()
    {
    	return $this->hasMany('App\ProductsAttributes','product_id');
    }
}

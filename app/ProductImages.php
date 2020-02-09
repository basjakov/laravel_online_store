<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $fillable = ['product_id','filename'];

    public function product_img(){
        return $this->belongsTo('App\Product');
    }
}

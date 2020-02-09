<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','distibutor','price','sale','first_image','itemvideo','short_desc','large_desc','weight'
    ];
}

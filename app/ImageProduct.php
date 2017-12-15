<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $table = 'images_products';
    public $timestamps = false;

    public function Product()
    {
        return $this->belongsTo('App\Product');
    }
}

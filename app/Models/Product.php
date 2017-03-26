<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
        'product_name',
        'product_price',
        'product_desc',
    ];

    public function getProductPriceAttribute($productPrice) {
        return number_format($productPrice);
    }

    public function setProductPriceAttribute($productPrice) {
        $this->attributes['product_price'] = round($productPrice * 100);
    }
}

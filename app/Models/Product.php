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

    public $hidden = [
        'created_at',
        'updated_at',
        'id',
    ];

    public function getProductPriceAttribute($productPrice) {
        return number_format(round($productPrice / 100), 2, ',', ',');
    }

    public function setProductPriceAttribute($productPrice) {
        $this->attributes['product_price'] = round($productPrice * 100);
    }
}

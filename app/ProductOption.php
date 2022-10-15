<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    // product_id, option_name, option_price
    protected $fillable = ['product_id', 'option_name', 'option_price']; 
    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}

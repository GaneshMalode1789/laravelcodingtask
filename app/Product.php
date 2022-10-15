<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['cat_id', 'sub_cat_id', 'product_name', 'product_description', 'product_code', 'product_url', 'product_status']; 
    public function category() {
        return $this->belongsTo(Category::class, 'cat_id', 'cat_id');
    }
    public function subcategory() {
        return $this->belongsTo(SubCategory::class, 'sub_cat_id', 'sub_cat_id');
    }
}

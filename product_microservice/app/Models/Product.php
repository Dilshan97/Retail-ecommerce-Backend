<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        "product_categories_id",
        "product_name",
        "product_description",
        "product_slug",
        "stock",
        "price"
    ];

    public function product_category()
    {
        return $this->belongsTo('App\Models\ProductCategory');
    }
}

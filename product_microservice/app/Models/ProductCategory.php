<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = "product_categories";

    protected $fillable = [
        "category_name",
        "category_description"
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCategory\ProductCategoryCollection;
use App\Http\Resources\ProductCategory\ProductCategoryResource;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public function get_product_categories()
    {
        $categories = ProductCategory::all();

        if (count($categories) > 0) {
            return new ProductCategoryCollection($categories);
        } else {
            return "no product categories found";
        }
    }

    public function create_product_category(Request $request)
    {
        $category = new ProductCategory();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->category_slug = Str::slug(Str::lower($request->category_slug), "-");
        if ($category->save()) {
            return new ProductCategoryResource($category);
        } else {
            return 'cannot create';
        }
    }
}

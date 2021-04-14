<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function get_products()
    {
        $products = Product::all();

        if (count($products) > 0) {
            return new ProductCollection($products);
        } else {
            return "no products found";
        }
    }

    public function create_product(Request $request)
    {
        $product = new Product();
        $product->product_category_id = $request->product_category_id;
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->stock = $request->stock;
        $product->price = $request->price;

        if ($product->save()) {
            return new ProductResource($product);
        }
    }

    public function update_product(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->product_category_id = $request->product_category_id;
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->stock = $request->stock;
            $product->price = $request->price;

            if ($product->save()) {
                return new ProductResource($product);
            }
        } else {
            return "no product found";
        }
    }

    public function delete_product($id)
    {
        $product = Product::find($id);

        if ($product) {
            if ($product->destroy($id)) {
                return new ProductResource($product);
            }
        } else {
            return "no product found";
        }
    }

    public function get_product($id)
    {
        $product = Product::find($id);

        if ($product) {
            return new ProductResource($product);
        } else {
            return "no product found";
        }
    }
}

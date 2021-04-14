<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if ($request->product_image) {
            $image_parts = explode(";base64,", $request->product_image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image = base64_decode($image_parts[1]);
            $image_name = uniqid() . '.' . $image_type_aux[1];

            $path = '/product/';
            Storage::disk('public')->put($path . $image_name, $image);

            $product->product_image = $path . $image_name;
        }

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

            if ($request->product_image) {
                $image_parts = explode(";base64,", $request->product_image);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image = base64_decode($image_parts[1]);
                $image_name = uniqid() . '.' . $image_type_aux[1];

                $path = '/product/';
                $new_image = Storage::disk('public')->put($path . $image_name, $image);

                if($new_image) {
                    Storage::disk('public')->delete($product->product_image);
                    $product->product_image = $path . $image_name;
                }
            }

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
            Storage::disk('public')->delete($product->product_image);
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
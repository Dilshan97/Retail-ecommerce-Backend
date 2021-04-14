<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public static $wrap = 'product';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product_category_id' => $this->product_category_id,
            'product_name' => $this->product_name,
            'product_description' => $this->product_description,
            'product_image' => asset('storage').$this->product_image,
            'stock' => $this->stock,
            'price' => $this->price
        ];
    }
}

<?php

namespace App\Http\Resources\ProductCategory;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCategoryCollection extends ResourceCollection
{
    public static $wrap = 'product_category_list';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'product_category_list' => ProductCategoryResource::collection($this->collection)
        ];
    }
}

<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Item\ItemResource;
use App\Http\Resources\Payment\PaymentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public static $wrap = 'order';

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
            'cart_id' => $this->cart_id,
            'status' => $this->status,
            'customer_id' => $this->customer_id,
            'items' => ItemResource::collection($this->order_items),
            'payment' => new PaymentResource($this->payment)
        ];
    }
}

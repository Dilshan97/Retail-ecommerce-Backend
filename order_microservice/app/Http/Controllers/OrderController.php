<?php

namespace App\Http\Controllers;

use App\Http\Resources\Order\OrderCollection;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function get_orders()
    {
        $orders = Order::all();

        if(count($orders) > 0) {
            return new OrderCollection($orders);
        } else {
            return 'no orders found';
        }
    }

    public function create_order(Request $request)
    {
        $payment = new Payment();
        $payment->card_holder_name = $request->card_dtails['name'];
        $payment->card_number = $request->card_dtails['cNumber'];
        $payment->expiry_date = $request->card_dtails['expire_date'];
        $payment->amount = 1000;

        if($payment->save()) {
            $order = new Order();
            $order->cart_id = $request->cart_id;
            $order->customer_id = $request->auth['user']['id'];
            $order->payment_id = $payment->id;
            $order->status = 'order_placed';

            if($order->save()) {

                if($request->items) {
                    foreach ($request->items as $cart_item) {
                        $item = new OrderItem();
                        $item->order_id = $order->id;
                        $item->item = $cart_item['product']['product_name'];
                        $item->item_qty = $cart_item['quantity'];
                        $item->price = $cart_item['quantity'] * $cart_item['product']['price'];
                        $item->save();
                    }

                    return $order;
                }
            }
        }
    }

    public function get_order_by_customer()
    {

    }
}

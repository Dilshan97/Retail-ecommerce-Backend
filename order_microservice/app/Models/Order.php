<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'customer_id',
        'payment_id',
        'status'
    ];

    public function payment()
    {
        return $this->belongsTo('App\Models\Payment');
    }

    public function order_items()
    {
        return $this->hasMany('App\Models\OrderItem');
    }
}

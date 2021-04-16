<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_holder_name',
        'card_number',
        'expiry_date',
        'amount'
    ];

    public function order()
    {
        return $this->hasOne('App\Models\Order');
    }
}

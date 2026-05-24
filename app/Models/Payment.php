<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'payment_method',
        'payment_amount',
        'payment_status',
        'transaction_id',
        'payment_type',
        'transaction_status',
        'transaction_time',
        'settlement_time',
        'fraud_status',
        'issuer',
        'acquirer',
        'currency',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

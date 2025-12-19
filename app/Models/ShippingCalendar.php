<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ShippingCalendar extends Model
{
    protected $table = 'shipping_calendars';

    protected $fillable = [
        'order_id',
        'user_id',
        'title',
        'shipped_at',
        'estimated_arrival',
        'delivered_at',
        'status',
    ];

    protected $casts = [
        'shipped_at' => 'date',
        'estimated_arrival' => 'date',
        'delivered_at' => 'date',
    ];
}


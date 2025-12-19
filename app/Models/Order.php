<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 'pending';

    protected $fillable = [
        'user_id',
        'status',
        'total',
        'shipping_service',
        'tracking_number'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(\App\Models\OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    // Relasi ke OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Hitung total order secara otomatis (opsional)
    public function calculateTotal()
    {
        return $this->orderItems->sum(fn ($item) => $item->price * $item->quantity);
    }

    public function shippingCalendar()
    {
        return $this->hasOne(
            ShippingCalendar::class,
            'order_id',
            'id'
        );
    }
}

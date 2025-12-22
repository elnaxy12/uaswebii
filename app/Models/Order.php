<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;

use Illuminate\Support\Facades\DB;


class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public const STATUS_PENDING = 'pending';

    protected $fillable = [
        'user_id',
        'status',
        'total',
        'shipping_service',
        'payment_expired_at',
        'tracking_number'
    ];

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

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

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

    public function cancelAndRestoreStock($status = 'expired')
    {
        if ($this->status !== 'waiting_payment') {
            return;
        }

        foreach ($this->items as $item) {
            if ($item->size_id) {
                DB::table('product_sizes')
                    ->where('product_id', $item->product_id)
                    ->where('size_id', $item->size_id)
                    ->increment('stock', $item->quantity);
            } else {
                $item->product->increment('stock', $item->quantity);
            }
        }

        $this->update(['status' => $status]);
    }
}

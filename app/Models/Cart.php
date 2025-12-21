<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'size_id',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }


    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function stock()
    {
        return $this->product
            ?->sizes
            ?->firstWhere('id', $this->size_id)
            ?->pivot
            ?->stock ?? 0;
    }

}

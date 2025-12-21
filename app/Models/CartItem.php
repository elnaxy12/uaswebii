<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'product_id',
        'size_id',
        'quantity',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /** Harga tambahan dari pivot */
    public function additionalPrice(): int
    {
        return $this->product
            ?->sizes
            ?->firstWhere('id', $this->size_id)
            ?->pivot
            ?->additional_price ?? 0;
    }

    /** Stock dari pivot */
    public function stock(): int
    {
        return $this->product
            ?->sizes
            ?->firstWhere('id', $this->size_id)
            ?->pivot
            ?->stock ?? 0;
    }

    /** Harga per item */
    public function pricePerItem(): int
    {
        return ($this->product?->price ?? 0) + $this->additionalPrice();
    }

    /** Subtotal */
    public function subtotal(): int
    {
        return $this->pricePerItem() * ($this->quantity ?? 1);
    }
}


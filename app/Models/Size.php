<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'sort_order' 
    ];

    protected $casts = [
        'sort_order' => 'integer' 
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_sizes')
                    ->withPivot('stock', 'additional_price	')
                    ->withTimestamps();
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order'); 
    }

    public function scopeAvailable($query)
    {
        return $query->whereHas('products', function ($q) {
            $q->where('product_sizes.stock', '>', 0);
        });
    }
}

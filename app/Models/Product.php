<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'image',
        'category_id',
        'etalase_id',
        'badge',
        'is_active',
        'views'
    ];

    protected $appends = ['total_stock'];

    /**
     * Get the category that owns the product.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the sizes for the product.
     */
    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'product_sizes')
                    ->withPivot('stock', 'additional_price')
                    ->withTimestamps();
    }

    /**
     * Get only available sizes (with stock > 0)
     */
    public function availableSizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'product_sizes')
                    ->wherePivot('stock', '>', 0)
                    ->orderBy('sort_order') 
                    ->withPivot('stock', 'additional_price');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}

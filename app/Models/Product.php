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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'product_sizes')
                    ->withPivot('stock', 'additional_price')
                    ->withTimestamps();
    }

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

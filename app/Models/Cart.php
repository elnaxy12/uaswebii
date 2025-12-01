<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'size_id', // ✅ PASTIKAN ADA
        'quantity'
    ];
    
    // Relasi jika perlu
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
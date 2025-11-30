<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products'; // nama tabel
    protected $fillable = [
        'name',
        'price',
        'image',
        'etalase_id',
        'description',
        'stock'
    ];

    // Relasi ke Etalase
    public function etalase()
    {
        return $this->belongsTo(Etalase::class, 'etalase_id');
    }
}

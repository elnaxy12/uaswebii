<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etalase extends Model
{
    protected $table = 'etalases'; // nama tabel
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    // Relasi ke Product
    public function products()
    {
        return $this->hasMany(Product::class, 'etalase_id');
    }
}

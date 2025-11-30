<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etalase;

class EtalaseSeeder extends Seeder
{
    public function run(): void
    {
        Etalase::create(['name' => 'Sepatu']);
        Etalase::create(['name' => 'Bag']);
        Etalase::create(['name' => 'Jersey']);
        Etalase::create(['name' => 'Ball']);
    }
}

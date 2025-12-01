<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    public function run(): void
    {
        $sizes = [
            ['code' => 'XS', 'name' => 'Extra Small', 'sort_order' => 1],
            ['code' => 'S', 'name' => 'Small', 'sort_order' => 2],
            ['code' => 'M', 'name' => 'Medium', 'sort_order' => 3],
            ['code' => 'L', 'name' => 'Large', 'sort_order' => 4],
            ['code' => 'XL', 'name' => 'Extra Large', 'sort_order' => 5],
            ['code' => 'XXL', 'name' => 'Double Extra Large', 'sort_order' => 6],
        ];

        foreach ($sizes as $size) {
            Size::create($size);
        }
    }
}

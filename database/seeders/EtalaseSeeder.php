<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etalase;
use Illuminate\Support\Str;

class EtalaseSeeder extends Seeder
{
    public function run(): void
    {
        $etalases = [
            ['name' => 'Men\'s Shoes'],
            ['name' => 'Women\'s Shoes'],
            ['name' => 'Kids\' Shoes'],
            ['name' => 'Sports'],
            ['name' => 'Originals'],
            ['name' => 'Running'],
            ['name' => 'Casual'],
            ['name' => 'Basketball'],
        ];

        foreach ($etalases as $etalaseData) {
            // Cek dulu apakah etalase sudah ada berdasarkan nama
            $etalase = Etalase::where('name', $etalaseData['name'])->first();

            if (!$etalase) {
                // Buat slug dari name
                $slug = Str::slug($etalaseData['name']);

                Etalase::create([
                    'name' => $etalaseData['name'],
                    'slug' => $slug,
                    'description' => $etalaseData['description'] ?? null,
                    'is_active' => true,
                ]);
            }
        }
    }
}

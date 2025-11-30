<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin (hindari duplikat)
        Admin::firstOrCreate(
            ['email' => 'admin@gmail.com'], // cek dulu email
            [
                'name' => 'Admin',
                'password' => Hash::make('P@55word'),
                'address' => 'Indonesia',
                'role' => 'admin',
            ]
        );

        // Seeder lain
        $this->call([
            ProductSeeder::class,
        ]);
    }
}

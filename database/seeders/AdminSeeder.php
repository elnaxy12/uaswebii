<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    public function run(): void
    {

        // Admin
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('P@55word'),
            'address' => 'Indonesia',
            'role' => 'admin',
        ]);
    }
}

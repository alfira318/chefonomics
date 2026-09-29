<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'     => 'Administrator',
            'username' => 'admin', // <-- Tambahkan baris ini!
            'email'    => 'admin@gmail.com',
            'role'     => 'admin',
            'password' => Hash::make('admin123'),
        ]);
    }
}
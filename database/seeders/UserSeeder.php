<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name' => 'super-admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('Admin@1234!'),
            'role' => 'super-admin',
            'email_verified_at' => now(),
        ]);
    }
}

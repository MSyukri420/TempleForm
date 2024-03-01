<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        User::create([
            'surname' => 'Admin',
            'givenName' => 'User',
            'email' => 'admin@example.com',
            'address' => '123 Admin Street',
            'contact' => '1234567890',
            'password' => Hash::make('admin1'),
            'is_admin' => true,
        ]);
    }
}

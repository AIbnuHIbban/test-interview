<?php

namespace Database\Seeders;

use App\Models\Customers;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Staff User',
                'email' => 'staff@mail.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        ]);

        Customers::insert([
            'name' => 'Customers',
            'email' => 'customer@mail.com',
            'phone' => '081234567891',
        ]);
    }
}

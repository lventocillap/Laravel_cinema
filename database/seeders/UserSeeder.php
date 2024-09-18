<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'luis@gmail.com',
            'password' => '1234'
        ]);
        User::create([
            'email' => 'diego@gmail.com',
            'password' => '123456'
        ]);
    }
}

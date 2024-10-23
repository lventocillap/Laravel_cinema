<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoomStatusesSeader::class,
            MovieStatusesSeader::class,
            MovieSeeder::class,
            UserSeeder::class,
            ProfileSeeder::class,
            RoomSeeder::class,
            SeatStatusesSeeder::class,
            SeatSeeder::class,
            PriceSeeder::class,
            BillboardSeeder::class,
        ]);
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

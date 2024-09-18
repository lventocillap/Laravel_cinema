<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'capacity' => '10',
            'statuses_id' => '1',
        ]);
        Room::create([
            'capacity' => '20',
            'statuses_id' => '1',
        ]);
    }
}

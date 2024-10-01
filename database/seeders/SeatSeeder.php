<?php

namespace Database\Seeders;

use App\Enums\SeatEnum;
use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seats = SeatEnum::cases();
        foreach($seats as $seat){
            Seat::create([
                'room_id' => $seat->roomId(),
                'nro_seat' => $seat->value,
                'status_id' => $seat->status()
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Enums\SeatStatusesEnum;
use App\Models\SeatStatuses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seatStatuses = SeatStatusesEnum::cases();
        foreach($seatStatuses as $status){
            SeatStatuses::create([
                'name' => $status->value
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Room_statuses;
use App\Enums\RoomStatusesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomStatusesSeader extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomStatuses = RoomStatusesEnum::cases();

        foreach($roomStatuses as $roomStatus){
            Room_statuses::create([
                'name' =>$roomStatus->value
            ]);
        }
    }   
}

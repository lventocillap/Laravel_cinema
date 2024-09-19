<?php

namespace Database\Seeders;

use App\Enums\BillboardEnum;
use App\Models\Billboard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $billboards = BillboardEnum::cases();
        foreach($billboards as $billboard){
            Billboard::create([
                'movie_id' => $billboard->value,
                'room_id' => $billboard->roomId(),
                'star_date' => $billboard->starDate(),
                'end_date' => $billboard->endDate()
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Enums\MovieEnum;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seats = MovieEnum::cases();
        foreach($seats as $seat){
            Movie::create([
                'title' => $seat->value,
                'gender' => $seat->gender(),
                'time' => $seat->time(),
                'premiere' => $seat->premiere(),
                'status_id' => $seat->status(),
            ]);
        }
    }
}

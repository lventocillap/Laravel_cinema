<?php

namespace Database\Seeders;

use App\Models\Movie_statuses;
use App\Enums\MovieStatusesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieStatusesSeader extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movieStatuses = MovieStatusesEnum::cases();
        foreach($movieStatuses as $status){
            Movie_statuses::create([
                'name' =>$status->value
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\MovieStatuses;
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
            MovieStatuses::create([
                'name' =>$status->value
            ]);
        }
    }
}

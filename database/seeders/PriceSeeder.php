<?php

namespace Database\Seeders;

use App\Enums\PriceEnum;
use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prices = PriceEnum::cases();
        foreach($prices as $price){
            Price::create([
                'type' => $price->value,
                'price' => $price->price()
            ]);
        }
    }
}

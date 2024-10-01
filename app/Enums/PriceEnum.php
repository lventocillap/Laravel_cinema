<?php

namespace App\Enums;

enum PriceEnum: string
{
    case ADULT = 'adulto';
    case CHILD = 'niño';
    case THIRD_AGE = 'tercera edad';

    public function price()
    {
        return match($this){
            self::ADULT => 20,
            self::CHILD => 15,
            self::THIRD_AGE => 15,
        };
    }
}

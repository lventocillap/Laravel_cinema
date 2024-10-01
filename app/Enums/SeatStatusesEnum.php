<?php

namespace App\Enums;

enum SeatStatusesEnum:string
{
    case AVALAIBLE = 'Disponible';
    case OCCUPIED = 'Ocupado';
    case NO_AVALAIBLE = 'No Disponible';

    public function id()
    {
        return match($this){
            self::AVALAIBLE => 1,
            self::OCCUPIED => 2,
            self::NO_AVALAIBLE => 3
        };
    }
}

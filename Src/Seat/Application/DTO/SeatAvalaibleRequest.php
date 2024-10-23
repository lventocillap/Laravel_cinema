<?php

declare(strict_types=1);

namespace Src\Seat\Application\DTO;

use Exception;
use App\Models\Seat;
use App\Models\SeatStatuses;
use App\Enums\SeatStatusesEnum;

class SeatAvalaibleRequest
{
    public function __construct(
        public array $seatIds
    ) {
        $this->seatAvalaible();
    }
    public function seatAvalaible(){
        foreach($this->seatIds as $value)
        if(!Seat::where('id',$value)->where('status_id',SeatStatuses::where('name', SeatStatusesEnum::AVALAIBLE->value)->first()->id)->exists()){
            throw new Exception('Not seat avalaible '.$value);
        }
    }
}

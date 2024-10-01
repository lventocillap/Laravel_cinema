<?php
declare(strict_types=1);

namespace App\Services\Seat;

use App\Enums\SeatStatusesEnum;
use App\Models\Seat;

class SeatService
{
    static function seatStatusUpdate($request):void
    {
        $seats = $request->seat_id;
        foreach($seats as $seat){
            $seatId = Seat::find($seat);
            $seatId->update([
                'status_id' => SeatStatusesEnum::OCCUPIED->id()
            ]);
        }
    }
}
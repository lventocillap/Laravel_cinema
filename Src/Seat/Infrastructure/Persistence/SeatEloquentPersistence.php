<?php
declare(strict_types=1);

namespace Src\Seat\Infrastructure\Persistence;

use App\Enums\SeatStatusesEnum;
use App\Models\Seat as AppSeat;
use App\Models\SeatStatuses as AppSeatStatuses;
use Src\Seat\Domain\Exception\SeatNotFoundException;
use Src\Seat\Domain\Interface\SeatInterface;

class SeatEloquentPersistence implements SeatInterface
{
    public function updateStatusSeat(int $id):void
    {
        $seat = AppSeat::find($id);
        if(!$seat){
            throw new SeatNotFoundException;
        }
        $seat->update([
            'status_id' => AppSeatStatuses::where('name',SeatStatusesEnum::OCCUPIED->value)->first()->id
        ]);
    }
}
<?php

declare(strict_types=1);

namespace Src\Seat\Application\UseCase;

use Src\Seat\Domain\Interface\SeatInterface;

class UpdatesSeatsStatus
{
    public function __construct(
        private SeatInterface $seatInterface
    ) {}
    public function execute(array $seatIds):void
    {
        foreach($seatIds as $seatId){
            $this->seatInterface->updateStatusSeat($seatId);
        }
        
    }
}

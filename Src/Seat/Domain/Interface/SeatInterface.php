<?php
declare(strict_types=1);

namespace Src\Seat\Domain\Interface;

interface SeatInterface
{
    public function updateStatusSeat(int $id):void;
}
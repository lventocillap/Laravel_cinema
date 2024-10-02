<?php
declare(strict_types=1);

namespace Src\Seat\Domain\Exception;

use Exception;

class SeatNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct('Seat not found', 404);
    }
}
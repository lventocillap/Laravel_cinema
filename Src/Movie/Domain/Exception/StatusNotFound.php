<?php
declare(strict_types=1);

namespace Src\Movie\Domain\Exception;

use Exception;

class StatusNotFound extends Exception
{
    public function __construct()
    {
        parent::__construct('Status not found',404);
    }
}
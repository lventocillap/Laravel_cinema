<?php
declare(strict_types=1);

namespace Src\Movie\Domain\Exception;

use Exception;

class MovieNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct('Movie not found',404);  
    }
}
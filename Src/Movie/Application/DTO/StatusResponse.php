<?php
declare(strict_types=1);

namespace Src\Movie\Application\DTO;

class StatusResponse
{
    public function __construct(
        public int $id,
        public string $name
    )
    {
    }
}
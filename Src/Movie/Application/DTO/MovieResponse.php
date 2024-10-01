<?php
declare(strict_types=1);

namespace Src\Movie\Application\DTO;

class MovieResponse
{
    public function __construct(
        public int $id,
        public string $title,
        public string $gender,
        public string $time,
        public string $premiere,
        public StatusResponse $statusId
    )
    {
        
    }
}
<?php

declare(strict_types=1);

namespace Src\Movie\Application\DTO;

class MovieRequest
{
    public function __construct(
        public string $title,
        public string $gender,
        public string $time,
        public string $premiere,
        public int $movieStatus
    ) {}
    
}

<?php

declare(strict_types=1);

namespace Src\Profile\Application\DTO;

class IdProfileResponse
{
    public function __construct(
        public int $id
    ) {}
}

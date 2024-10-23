<?php

declare(strict_types=1);

namespace Src\Profile\Application\DTO;

class ProfileIndependentRequest
{
    public function __construct(
        public string $documentNumber,
        public string $cellphone,
        public string $emailVerification,
        public string $name,
    ) {}
}

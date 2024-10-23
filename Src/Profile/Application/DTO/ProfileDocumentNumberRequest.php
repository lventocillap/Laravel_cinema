<?php

declare(strict_types=1);

namespace Src\Profile\Application\DTO;

class ProfileDocumentNumberRequest
{
    public function __construct(
        public string $documentNumber
    ) {}
}

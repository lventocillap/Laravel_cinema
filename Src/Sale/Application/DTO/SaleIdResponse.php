<?php
declare(strict_types=1);

namespace Src\Sale\Application\DTO;

class SaleIdResponse
{
    public function __construct(
        public int $id
    )
    {}
}


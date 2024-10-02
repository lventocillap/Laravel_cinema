<?php

declare(strict_types=1);

namespace Src\DetailSale\Application\DTO;

class DetailSaleRequest
{
    public function __construct(
        public int $saleId,
        public int $billboardId,
        public array $seatIds,
        public array $priceIds
    ) {}
}

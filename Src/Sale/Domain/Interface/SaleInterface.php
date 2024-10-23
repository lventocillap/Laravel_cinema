<?php
declare(strict_types=1);

namespace Src\Sale\Domain\Interface;

use Src\Sale\Domain\Model\Sale;

interface SaleInterface
{
    public function newSale(array $priceIds, int $profileId):Sale;
}
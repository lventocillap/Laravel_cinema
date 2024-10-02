<?php
declare(strict_types=1);

namespace Src\Sale\Domain\Interface;

use App\Models\Sale as AppSale;

interface SaleInterface
{
    public function newSale(array $priceIds):AppSale;
}
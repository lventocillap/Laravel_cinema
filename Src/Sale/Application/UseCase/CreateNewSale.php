<?php
declare(strict_types=1);

namespace Src\Sale\Application\UseCase;

use App\Models\Sale;
use Src\Sale\Domain\Interface\SaleInterface;

class CreateNewSale
{
    public function __construct(
        private SaleInterface $saleInterface
    )
    {}
    public function execute(array $priceIds):Sale
    {
        $sale = $this->saleInterface->newSale($priceIds);
        return $sale;
    }
}
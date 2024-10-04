<?php
declare(strict_types=1);

namespace Src\Sale\Application\UseCase;


use Src\Sale\Domain\Interface\SaleInterface;
use Src\Sale\Domain\Model\Sale;

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
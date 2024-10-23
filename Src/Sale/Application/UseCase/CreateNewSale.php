<?php
declare(strict_types=1);

namespace Src\Sale\Application\UseCase;

use Src\Sale\Application\DTO\SaleIdResponse;
use Src\Sale\Domain\Interface\SaleInterface;

class CreateNewSale
{
    public function __construct(
        private SaleInterface $saleInterface
    )
    {}
    public function execute(array $priceIds, int $profileId):SaleIdResponse
    {
        $sale = $this->saleInterface->newSale($priceIds, $profileId);
        return new SaleIdResponse($sale->getId());
    }
}
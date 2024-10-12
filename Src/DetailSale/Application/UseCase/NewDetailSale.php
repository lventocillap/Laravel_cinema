<?php
declare(strict_types=1);

namespace Src\DetailSale\Application\UseCase;

use Exception;
use Illuminate\Http\JsonResponse;
use Src\DetailSale\Application\DTO\DetailSaleRequest;
use Src\DetailSale\Domain\Interface\DetailSaleInterface;

class NewDetailSale
{
    public function __construct(
        private DetailSaleInterface $detailSaleInterface
    )
    {
    }
    public function execute(DetailSaleRequest $request):void
    {
        if(count($request->priceIds) !== count($request->seatIds)){
            throw new Exception('They are not the same');
        }
        foreach($request->priceIds as $index => $priceId)
        $this->detailSaleInterface->newDetailSale(
            $request->saleId, 
            $request->billboardId, 
            $request->seatIds[$index], 
            $priceId);
    }
}
<?php

declare(strict_types=1);

namespace Src\DetailSale\Utils;

use Illuminate\Http\Request;
use Src\DetailSale\Application\DTO\DetailSaleRequest;
use Src\DetailSale\Application\UseCase\NewDetailSale;

trait CreateDetailSale
{
    public function executeCreateDetailSale(NewDetailSale $newDetailSale, Request $request, int $saleId): void 
    {
        $newDetailSale->execute(new DetailSaleRequest(
            $saleId,
            $request->billboard_id,
            $request->seat_id,
            $request->price_id
        ));
    }
}

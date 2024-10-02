<?php
declare(strict_types=1);

namespace Src\DetailSale\Infrastructure\Persistence;

use App\Models\DetailSale as AppDetailSale;
use Src\DetailSale\Domain\Interface\DetailSaleInterface;

class DetailSaleEloquentPersistence implements DetailSaleInterface
{
    public function newDetailSale(int $saleId, int $billboardId, int $seatId, int $priceId):void
    {
        
        AppDetailSale::create([
            'sale_id' => $saleId,
            'billboard_id' => $billboardId,
            'seat_id' => $seatId,
            'price_id' => $priceId
        ]);
    }
}
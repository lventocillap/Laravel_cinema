<?php 
declare(strict_types=1);

namespace Src\DetailSale\Domain\Interface;

interface DetailSaleInterface
{
    public function newDetailSale(int $saleId,int $billboardId,int $seatId,int $priceId):void;
}   
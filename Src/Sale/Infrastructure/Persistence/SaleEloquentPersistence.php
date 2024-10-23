<?php

declare(strict_types=1);

namespace Src\Sale\Infrastructure\Persistence;

use App\Models\Price;
use Src\Sale\Domain\Model\Sale;
use App\Models\Sale as AppSale;
use Src\Sale\Domain\Interface\SaleInterface;

class SaleEloquentPersistence implements SaleInterface
{
    public function newSale(array $priceIds, int $clientId): Sale
    {
        $total = 0;
        foreach ($priceIds as $priceId) {
            $price = Price::find($priceId);
            if ($price) {
                $total += $price->price;
            }
        }
        $sale = AppSale::create([
            'client_id' => $clientId,
            'date' => now()->format('Y-m-d'),
            'total_price' => $total
        ]);
        return new Sale(
            $sale->id,
            $sale->client_id,
            $sale->date,
            $sale->total_price
        );
    }
}
